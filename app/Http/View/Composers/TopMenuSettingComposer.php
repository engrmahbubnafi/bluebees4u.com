<?php
namespace App\Http\View\Composers;

use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class TopMenuSettingComposer {

	public function compose(View $view) {
		$view->with('menu_settings', App::make('menu_settings'));
	}
}
