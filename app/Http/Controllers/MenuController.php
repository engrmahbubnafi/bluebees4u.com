<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\Menu;
use App\Models\WebContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('id', 'DESC')->get();
        return View('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_type = $this->getEnumDescList('menus', 'type');
        $web_content_data = WebContent::pluck('title', 'id')->prepend('Select One', '');
        $document_type_api = DocumentType::select([DB::raw('slug as slug_data'), 'slug'])->pluck('slug', 'slug_data');
        return view('admin.menu.create', compact('menu_type', 'web_content_data', 'document_type_api'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:menus',
            'slug' => 'required|string|unique:menus',
            'type' => 'required',
            'status' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $imageName = null;
            $file = request()->file('file');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
            }
            $file_name = '';
            if ($imageName != null) {
                $file->storeAs('/public/menu_icon', $imageName);
                $file_name = '/menu_icon/' . $imageName;
            }

            $menu = new Menu();
            $menu->name = $request->name;
            $menu->slug = $request->slug;
            $menu->description = $request->description;
            $menu->type = $request->type;
            $menu->file = $file_name;
            $menu->web_content_id = $request->web_content_id;
            $menu->status = $request->status == 'active' ? 1 : 0;
            $menu->save();

            if (isset($request->api_link) && count($request->api_link) > 0) {
                foreach ($request->api_link as $data) {
                    DB::table('api_links')->insert([
                        'menu_id' => $menu->id,
                        'api_link' => $data
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('menu.index')
                ->with('flash_success', "Menu Data Save");
        } catch (\Exception $e) {dd($e);
            DB::rollback();
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $api_links = DB::table('api_links')->where('menu_id', $menu->id)->pluck('api_link','api_link')->prepend('Select One', '');
        $menu_type = $this->getEnumDescList('menus', 'type');
        $web_content_data = WebContent::where('status',1)->pluck('title', 'id')->prepend('Select One', '');
        $document_type_api = DocumentType::where('status',1)->select([DB::raw('slug as slug_data'), 'slug'])->pluck('slug', 'slug_data');
        return view('admin.menu.edit', compact('menu', 'menu_type', 'web_content_data', 'document_type_api', 'api_links'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|' . Rule::unique('menus')->ignore($id, 'id'),
            'type' => 'required',
            'slug' => 'required|string|' . Rule::unique('menus')->ignore($id, 'id'),
            'status' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $menu = Menu::find($id);
            $old_image_name = $menu->file;

            $imageName = null;
            $file = request()->file('file');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
            }
            $file_name = $old_image_name;
            if ($imageName != null) {
                $file->storeAs('/public/menu_icon', $imageName);
                $file_name = '/menu_icon/' . $imageName;
            }

            $menu->name = $request->name;
            $menu->slug = $request->slug;
            $menu->type = $request->type;
            $menu->description = $request->description;
            $menu->file = $file_name;
            $menu->web_content_id = $request->web_content_id;
            $menu->status = $request->status == 'active' ? 1 : 0;
            $menu->save();

            if (isset($request->api_link) && count($request->api_link) > 0) {
                DB::table('api_links')->where('menu_id', $menu->id)->delete();
                foreach ($request->api_link as $data) {
                    DB::table('api_links')->insert([
                        'menu_id' => $menu->id,
                        'api_link' => $data
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('menu.index')
                ->with('flash_success', "Data Save");

        } catch (\Exception $e) {dd($e);
            DB::rollback();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getEnumDescList($tableName, $columnName)
    {
        $enumArray = [];
        $enumString = DB::table('information_schema.columns')
            ->where('TABLE_SCHEMA', env('DB_DATABASE'))
            ->where('table_name', $tableName)
            ->where('data_type', 'enum')
            ->where('column_name', $columnName)
            ->groupBy('column_name')
            ->first(['COLUMN_TYPE']);
        if (!isset($enumString->COLUMN_TYPE)) {
            return $enumArray;
        }
        /*  To eleminate "enum(" and ")" from COLUMN_TYPE   */
        $enumSubString = substr($enumString->COLUMN_TYPE, 5, -1);
        $explodedEnumArray = explode(",", $enumSubString);
        foreach ($explodedEnumArray as $key => $enumElement) {
            $element = substr($enumElement, 1, -1);
            $enumArray[$element] = $element;
        }
        return $enumArray;
    }
}
