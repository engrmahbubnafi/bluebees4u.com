<?php

namespace App\Providers;

use App\Models\MenuLocationMapping;
use App\Models\Payment;
use App\Models\RolePermission;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('siteSettingObj', function ($app) {
            return Cache::rememberForever('site_setting_cache', function () {
                return SiteSetting::first();
            });
        });

        $this->app->singleton('premitedMenuArr', function ($app) {
            $controllerArr = [];
            $allIndexes = [];
            if (Auth::check()) {
                $rolePermissionObj = Cache::rememberForever('all_role_pemission_cache', function () {
                    return RolePermission::select(
                        'permission_id',
                        'role_id'
                    )
                        ->with(['permission' => function ($q) {
                            $q->select(
                                'id',
                                'name',
                                'parent_id'
                            );
                        }])
                        ->get()
                        ->groupBy('role_id');
                });
                // dd($rolePermissionObj);
                if ($rolePermissionObj->count()) {
                    $rolePermissions = $rolePermissionObj->get(Auth::user()->role_id);
                    if ($rolePermissions) {
                        foreach ($rolePermissions->toArray() as $key => $value) {
                            if ($value['permission']['parent_id'] == null) {
                                $controllerArr[$value['permission']['id']] = $value['permission']['name'];
                            } else {
                                $allIndexes[] = $controllerArr[$value['permission']['parent_id']] . '@' . $value['permission']['name'];
                            }
                        }
                    } else {
                        $allIndexes = ['DefaultController@index'];
                    }
                }
            }
            return $allIndexes;
        });

        $this->app->singleton('menu_settings', function () {
            return Cache::rememberForever('menu_settings_cache', function () {
                return MenuLocationMapping::with([
                    'children.children',
                ])
                    ->join('menus', 'menus.id', '=', 'menu_location_mappings.menu_id')
                    ->select(
                        'menu_location_mappings.id',
                        'menu_location_mappings.location_id',
                        'menu_location_mappings.parent_id',
                        'menus.name',
                        'menus.slug',
                        'menus.type',
                        'menus.description',
                        'menus.file'
                    )
                    ->where('menus.status', 1)
                    ->whereNull('menu_location_mappings.parent_id')
                    ->orderBy('menu_location_mappings.sequence', 'ASC')
                    ->get();
            });

        });

        $this->app->singleton('uniqueSubscribers', function ($app) {
            return Cache::rememberForever('unique_subscribers_cache', function () {
                $uniquePayments = Payment::select(
                    'id',
                )
                    ->selectRaw(
                        'RANK() OVER ( PARTITION BY customer_id ORDER BY created_at desc) `rank`'
                    );

                return Payment::select(
                    'signupusers.*',
                    'packages.package_name',
                    'payments.id',
                    'payments.customer_id',
                    'payments.payment_package',
                    'payments.created_at',
                    'payments.updated_at'
                )
                    ->joinSub($uniquePayments, 'upayments', function ($query) {
                        $query->on('upayments.id', '=', 'payments.id')
                            ->where('upayments.rank', 1);
                    })
                    ->join('signupusers', 'payments.customer_id', '=', 'signupusers.customer_id')
                    ->join('packages', 'packages.id', '=', 'payments.payment_package')
                    ->orderBy('payments.updated_at', 'DESC')
                    ->get();
            });

        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
