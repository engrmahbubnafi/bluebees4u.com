<?php
namespace App\Http\View\Composers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class SiteSettingComposer {

	public function compose(View $view) {
		$view->with('site_settings', App::make('siteSettingObj'));
	}
}