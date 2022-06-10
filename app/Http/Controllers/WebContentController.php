<?php

namespace App\Http\Controllers;

use App\Models\WebContent;
use Illuminate\Http\Request;

class WebContentController extends Controller
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
        $web_content = WebContent::all();
        return View('admin.web_content.index', compact('web_content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.web_content.create');
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
            'title' => 'required|string',
            'meta_key' => 'required|string',
            'description' => 'required',
            'status' => 'required',
        ]);
        $web_content_data = new WebContent();
        $web_content_data->title = $request->title;
        $web_content_data->meta_key = $request->meta_key;
        $web_content_data->description = $request->description;
        $web_content_data->status = $request->status == 'active' ? 1 : 0;
        $web_content_data->save();

        return redirect()->route('web_content.index')
            ->with('flash_success', "Data Save");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $web_content_data = WebContent::find($id);
        return View('admin.web_content.edit', compact('web_content_data'));
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
            'title' => 'required|string',
            'meta_key' => 'required|string',
            'description' => 'required',
            'status' => 'required',
        ]);
        $web_content_data = WebContent::find($id);
        $web_content_data->title = $request->title;
        $web_content_data->meta_key = $request->meta_key;
        $web_content_data->description = $request->description;
        $web_content_data->status = $request->status == 'active' ? 1 : 0;
        $web_content_data->save();

        return redirect()->route('web_content.index')
            ->with('flash_success', "Data updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteDone = WebContent::destroy($id);
        if ($deleteDone) {
            $message = "You have successfully deleted";
            return redirect()->route('web_content.index')
                ->with('flash_success', $message);
        }
    }
    public function contentFileAttach(Request $request)
    {
        $file_name = $request->file;
        $imageName = null;
        $file = request()->file('file');
        if ($file != null) {
            $imageName = time() . '_' . $file->getClientOriginalName() . ($request->fileType == 'base64' ? '.' . str_replace("image/", '', $request->fileMimeType) : '');
        }
        if ($imageName != null) {
            $file->storeAs('/public/web_contents', $imageName);
            $file_name = 'storage/web_contents/' . $imageName;
        }
        return $file_name;
    }
}
