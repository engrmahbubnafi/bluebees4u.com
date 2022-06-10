<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuLocation;
use App\Models\MenuLocationMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuLocationMappingController extends Controller
{
    public function index()
    {
        return View('admin.menu_mapping.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:menu_locations',
            'status' => 'required',
        ]);
        $menuTocation = new MenuLocation();
        $menuTocation->name = $request->name;
        $menuTocation->status = $request->status == 'active' ? 1 : 0;
        $menuTocation->save();
        return redirect()->route('menuMapping',[$menuTocation->id])
            ->with('flash_success', "Data Save");
    }

    public function menuMapping($location_id = null)
    {
        if (!$location_id) {
            $location_id = 1;
        }

        $menuLocationMap = MenuLocationMapping::with([
            'children.children'
        ])
            ->join('menus','menus.id','=','menu_location_mappings.menu_id')
            ->select(
                'menu_location_mappings.id',
                'menu_location_mappings.parent_id',
                'menus.name',
                'menus.id as menu_id'
            )
            ->where('menus.status', 1)
            ->where('menu_location_mappings.location_id',$location_id)
            ->whereNull('menu_location_mappings.parent_id')
            ->orderBy('menu_location_mappings.sequence', 'ASC')
            ->get();

        $menuLocationMapArray = MenuLocationMapping::where('location_id',$location_id)
            ->groupBy('menu_id')
            ->pluck('location_id', 'menu_id');

        $menuList = Menu::where('menus.status', 1)->pluck('name', 'id');

        $menuLocations = MenuLocation::pluck('name', 'id');

        return View('admin.menu_mapping.create', compact('menuList', 'menuLocations', 'menuLocationMap', 'location_id', 'menuLocationMapArray'));
    }

    public function addMenuMap($location_id, $menu_id)
    {
        $menu_ids = explode(",", $menu_id);
        $sequenceCount = MenuLocationMapping::where('location_id', $location_id)->count();
        foreach ($menu_ids as $data) {
            $map_data = new MenuLocationMapping;
            $map_data->menu_id = $data;
            $map_data->location_id = $location_id;
            $map_data->sequence = $sequenceCount;
            $map_data->save();
            $sequenceCount++;
        }
        return redirect('/menu_mapping/' . $location_id);
    }

    public function removeAssignData($data)
    {
        $data = explode("_", $data);
        $menu_id = $data[0];
        $location_id = $data[1];
        MenuLocationMapping::where('menu_id', $menu_id)->where('location_id', $location_id)->delete();
        return redirect(route('menuMapping', array($location_id)))->with('flash_success', "Removed");
    }

    public function getLocationMap()
    {
        $menuLocationMapArray = MenuLocation::leftjoin('menu_location_mappings','menu_location_mappings.location_id','menu_locations.id')
            ->groupBy('menu_locations.id')
            ->get([DB::raw("Count('menu_location_mappings.menu_id') as Total"),'menu_locations.*']);
        return View('admin.menu_mapping.menu_location_list', compact('menuLocationMapArray'));
    }
}
