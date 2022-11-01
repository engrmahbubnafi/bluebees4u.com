<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\WebContent;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuData = Menu::where('slug', '/')->with('apiLinks')->firstOrNew();
        $webData = WebContent::where('id', $menuData->web_content_id)->firstOrNew();

        $sliderData = null;
        if ($menuData->apiLinks->firstWhere('api_link', 'slider')) {
            $response = Http::post(url('get-documents'), ['type' => ['slider']]);
            $sliderData = $response->collect()->first();
        }

        $apiLinks = $menuData->apiLinks->filter(function ($value, $key) {
            return $value->api_link != 'slider';
        });

        $productsSectionsDatas = collect();
        if ($apiLinks->count()) {
            $response = Http::post(url('get-documents'), ['type' => $apiLinks->pluck('api_link')]);
            $productsSectionsDatas = $response->object();
        }

        return view('front_site.home', compact(
            'sliderData',
            'webData',
            'productsSectionsDatas'
        ));
    }

    public function storageLinkCreate()
    {
        symlink(base_path() . '/storage/app/public', $_SERVER['DOCUMENT_ROOT'] . '/storage');

        dd('done');
    }
}
