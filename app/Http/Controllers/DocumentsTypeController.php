<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DocumentsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents_type = DocumentType::all();
        return View('admin.document_type.index', compact('documents_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.document_type.create');
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
            'name' => 'required|string|unique:document_types',
            'mime_type' => 'required|string',
            'status' => 'required',
        ]);
        $pattern = "/[-\, :]/";
        $components = preg_split($pattern, $request->name);
        $documents_type = new DocumentType();
        $documents_type->name = $request->name;
        $documents_type->slug = strtolower(implode('_',$components));
        $documents_type->mime_type = $request->mime_type;
        $documents_type->status = $request->status == 'active' ? 1 : 0;
        $documents_type->save();

        return redirect()->route('document_type.index')
            ->with('flash_success', "Data Save");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documents_type = DocumentType::find($id);
        return view('admin.document_type.edit', compact('documents_type'));
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
            'name' => 'required|string|' . Rule::unique('document_types')->ignore($id, 'id'),
            'mime_type' => 'required|string',
            'status' => 'required',
        ]);
        $pattern = "/[-\, :]/";
        $components = preg_split($pattern, $request->name);
        $documents_type = DocumentType::find($id);
        $documents_type->name = $request->name;
        $documents_type->slug = strtolower(implode('_',$components));
        $documents_type->mime_type = $request->mime_type;
        $documents_type->status = $request->status == 'active' ? 1 : 0;
        $documents_type->save();

        return redirect()->route('document_type.index')
            ->with('flash_success', "Data Save");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        //
//    }
    public function getDocumentType($id=null)
    {

        if (!$id) {
            $id = 1;
        }
        $documents=Document::where('type_id',$id)->orderBy('sequence')->get();
        $documents_type = DocumentType::pluck('name', 'id');

        return View('admin.document_type.type-wise-ses', compact('documents', 'documents_type','id'));
    }
}
