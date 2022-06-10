<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $roles          = Role::orderBy('is_deletable')->get();
        $roleArr        = Role::pluck('name', 'id');
        $deletableRoles = Role::deletable()->pluck('name', 'id');

        return View('admin.roles.index', compact('roles', 'roleArr', 'deletableRoles'));
    }

    public function create()
    {
        /*create permission*/
        $this->createRolePermission();
        $permission = [];

        $parents = Permission::where('parent_id', null)
            ->orderBy('name')
            ->pluck('name', 'id')
            ->toArray();

        $childs = Permission::whereIn('parent_id', array_keys($parents))
            ->where('name', '<>', 'systemsRoleUpdate')
            ->get(['name', 'id', 'parent_id']);

        if (count($parents)) {
            foreach ($childs as $ele) {
                $arrr[$ele->parent_id][$ele->id] = $ele->name;
            }
            foreach ($parents as $key => $parent) {
                foreach ($arrr[$key] as $key2 => $child) {
                    $permission[$parent][$key2] = $child;
                }
            }
        }

        return view('admin.roles.create', compact('permission', 'parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:55|unique:roles',
            'description' => 'required|string|max:100',
            'status'      => 'required',
        ]);

        $data = $request->only('name', 'description', 'status', 'is_deletable');
        if (!$request->exists('is_deletable')) {
            $data['is_deletable'] = 0;
        }

        if (!auth()->user()->isAdministrator()) {
            unset($data['is_deletable']);
        }

        $permissions = $request->get('permission_ids');

        $Role = Role::create($data);

        if ($Role) {
            if ($permissions && count($permissions)) {
                $rolePermissions = $Role->permissions()->sync($permissions);
                if ($rolePermissions) {
                    Cache::forget('all_role_pemission_cache');
                    $message = "You have successfully created";
                    return redirect()->route('roles.index')
                        ->with('flash_success', $message);
                } else {
                    $message = "You have successfully created role but no permission set";
                    return redirect()->route('roles.index')
                        ->with('flash_warning', $message);
                }
            } else {
                $message = "You have successfully created role but no permission set";
                return redirect()->route('roles.index')
                    ->with('flash_warning', $message);
            }

        } else {
            $message = "Opps! Something wrong. Please try again.";
            return redirect()->route('roles.create')
                ->with('flash_danger', $message);
        }

    }

    public function edit($id)
    {
        $this->createRolePermission();

        $roles = Role::findorfail($id);

        $permissions = Permission::with(['children' => function ($query) {
            return $query->where('name', '<>', 'systemsRoleUpdate');
        }])
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get()
            ->toArray();

        $checkPermissions = RolePermission::with('Permission')
            ->where('role_id', $id)
            ->pluck('permission_id')
            ->toArray();

        return View('admin.roles.edit', compact('permissions', 'checkPermissions', 'roles'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'        => 'required|string|max:55|unique:roles,name,' . $id,
            'description' => 'required|string|max:100',
            'status'      => 'required',
        ]);

        $data = $request->only('name', 'description', 'status', 'is_deletable');

        $permissions = request()->get('permissions');

        if (!isset($permissions)) {$permissions = [];}
        $Role = Role::find($id);
        $Role->fill($data);
        $Role->save();
        $Role->permissions()->sync($permissions);
        if ($Role) {
            Cache::forget('all_role_pemission_cache');
            $message = "You have successfully updated";
            return redirect()->route('roles.edit', $id)
                ->with('flash_success', $message);

        } else {
            $message = "Opps! Something wrong. Please try again.";
            return redirect()->route('roles.edit', $id)
                ->with('flash_danger', $message);
        }
    }

    public function destroy(Request $request, $id)
    {

        if ($countVal = User::where('role_id', $id)->count()) {
            if ($request->has('role_id')) {
                $data = $request->only('role_id');
                User::where('role_id', $id)->update($data);
            } else {
                $message = $countVal . ' ' . Str::plural('user', $countVal) . ' belogings to this role. Assain them another role or delete this user first.';
                return redirect()->route('roles.index')
                    ->with('flash_danger', $message);
            }
        }
        $permissionDelete = RolePermission::where('role_id', $id)->delete();
        Cache::forget('all_role_pemission_cache');
        $Role = Role::destroy($id);
        if ($Role) {
            $message = "You have successfully deleted";
            return redirect()->route('roles.index')
                ->with('flash_success', $message);
        }

    }

    private function permissionToAdministratorAndSuperAdmins()
    {
        $permissions = Permission::pluck('id');
        $roles       = Role::join('users', 'users.role_id', '=', 'roles.id')
            ->where('roles.is_editable', false)
            ->where('roles.is_deletable', false)
            ->select('roles.id')
            ->groupBy('roles.id')
            ->get();

        foreach ($roles as $role) {
            $role->permissions()->sync($permissions);
        }
    }

    private function permissionToAllSuppliers()
    {
        $collection   = collect();
        $spermissions = Permission::with(['children' => function ($q) {
            return $q->whereIn('name', [
                'index',
                'create',
                'store',
                'edit',
                'update',
                'destroy',
                'getDocumentsByType',
                'getMimeType'
            ]);
        }])
            ->whereIn('name', [
                'DocumentsController',
            ])
            ->get()
            ->map(function ($obj) use ($collection) {
                $collection->push([$obj->id]);
                return $collection->push($obj->children->pluck('id'));
            });

        $roles = Role::join('users', 'users.role_id', '=', 'roles.id')
            ->where('roles.is_editable', 1)
            ->where('roles.is_deletable', false)
            ->select('roles.id')
            ->groupBy('roles.id')
            ->get();

        $collapsedIds = $collection->collapse();

        foreach ($roles as $role) {
            $role->permissions()->sync($collapsedIds);
        }

    }

    public function systemsRoleUpdate()
    {

        $this->createRolePermission();

        /*===Administrator and superadmins===*/
        $this->permissionToAdministratorAndSuperAdmins();
        /*===Administrator and superadmins===*/

        /*===Suppliers===*/
        $this->permissionToAllSuppliers();
        /*===Suppliers===*/

        Cache::forget('all_role_pemission_cache');

        App::make('premitedMenuArr');

        $message = "You have successfully added";

        return redirect()->route('dashboard', 'home')
            ->with('flash_success', $message);

    }

    private function createRolePermission()
    {
        $allMenuListInserted = App::make('premitedMenuArr');
        //dd($allMenuListInserted);
        $allRoutes = Route::getRoutes();
        //dd($allRoutes);
        $controllers = [];
        foreach ($allRoutes as $route) {
            $action = $route->getAction();
            //dd($action['middleware']);
            if (is_array($action['middleware']) && in_array('auth.access', $action['middleware'])) {
                $controllerActionName = class_basename($action['controller']);
                //dd($controllerActionName);

                if (!in_array($controllerActionName, $allMenuListInserted)) {
                    $controllerAction                                        = explode('@', $controllerActionName);
                    $controllers[$controllerAction[0]][$controllerAction[1]] = $controllerAction[1];
                }
            }
        }

        foreach ($controllers as $key => $controller) {
            $data['name'] = $key;
            $parent       = Permission::firstOrCreate($data);
            if ($parent) {
                $data2['parent_id'] = $parent->id;
                foreach ($controller as $elements) {
                    $data2['name'] = $elements;
                    $all_done      = Permission::firstOrCreate($data2);
                }
            }
        }
    }

}
