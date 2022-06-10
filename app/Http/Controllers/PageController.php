<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\WebContent;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{

    public function pages($slug)
    {
        return view('pages.' . $slug);
    }

    private function getWebContent($menuObj)
    {
        $datas = WebContent::where('id', $menuObj->web_content_id)->firstOrNew();

        return view('front_site.web_content', compact('datas', 'menuObj'));
    }

    private function setApiLink($menuObj)
    {
        $linkData = [];

        foreach ($menuObj['apiLinks'] as $key => $data) {
            $linkData[$key] = $data['api_link'];
        }
        return $linkData;
    }
    private function getFunctionalContent($menuObj)
    {
        $linkData = $this->setApiLink($menuObj);
        $response = Http::post(url('get-documents'), ['type' => $linkData]);
        $datas    = $response->object();
        $template = 'functional_data';
        if (str_contains($menuObj, 'gallery')) {
            $template = 'gallery-template';
        }

        return view('front_site.' . $template, compact('datas', 'menuObj'));

    }

    private function getContentFunctionalBoth($menuObj)
    {
        $linkData    = $this->setApiLink($menuObj);
        $response    = Http::post(url('get-documents'), ['type' => $linkData]);
        $datas       = $response->object();
        $template    = 'content_functional_data';
        $contentData = WebContent::where('id', $menuObj->web_content_id)->firstOrNew();
        return view('front_site.' . $template, compact('datas', 'menuObj', 'contentData'));
    }

    public function contentGateway($slug)
    {
        if ($slug) {
            $menuData = Menu::where('slug', $slug)->with('apiLinks')->firstOrNew();
            if ($menuData && $menuData->type == 'Web') {
                return $this->getWebContent($menuData);
            }
            if ($menuData && $menuData->type == 'Functional') {
                return $this->getFunctionalContent($menuData);
            }
            if ($menuData && $menuData->type == 'Both') {
                return $this->getContentFunctionalBoth($menuData);
            }
        }
        return abort(400);

    }

}
