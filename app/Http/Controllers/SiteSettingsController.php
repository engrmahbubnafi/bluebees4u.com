<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Validator;

class SiteSettingsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $siteSettings = SiteSetting::findOrFail($id);

        return View('admin.site_settings.edit', compact('siteSettings'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->except('_method', '_token', 'lang_id');

        $validator = Validator::make($data,
            array(
                'site_title' => 'required',
                'author_email' => 'required|email',
                'logo' => 'image|max:2048',
            )
        );

        if ($validator->fails()) {
            return Redirect::route("site_settings.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }
        $data['social']=json_encode($data['social']);
        $imageName = null;
        $file = request()->file('logo');
        $old_image_name = isset($data['old_image']) ? $data['old_image'] : '';
        if ($file != null) {
            $imageName = time() . '_' . $file->getClientOriginalName();
            $data['logo'] = $imageName;
        }

        $imageName_inner = null;
        $file_inner = request()->file('logo_inner');
        $old_image_name_inner = isset($data['old_inner_image']) ? $data['old_inner_image'] : '';
        if ($file_inner != null) {
            $imageName_inner = time() . '_' . $file_inner->getClientOriginalName();
            $data['logo_inner'] = $imageName_inner;
        }

        unset($data['old_image'], $data['old_inner_image'], $data['symbol'], $data['position']);
        $site_settings_data = SiteSetting::where('id', $id)->update($data);

        if ($site_settings_data) {
            if ($imageName != null) {
                \Storage::delete('/public/site_settings/' . $old_image_name);
                $file->storeAs('/public/site_settings', $imageName);
            }
            if ($imageName_inner != null) {
                \Storage::delete('/public/site_settings/' . $old_image_name_inner);
                $file_inner->storeAs('/public/site_settings', $imageName_inner);
            }

            $message = "You have successfully updated";
            Cache::flush();
            return redirect()->route('site_settings.edit', $id)
                ->with('flash_success', $message);
        } else {

            $message = "You don't update anything";
            return redirect()->route('site_settings.edit', $id)
                ->with('flash_warning', $message);
        }
    }


}
