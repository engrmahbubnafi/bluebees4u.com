<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::join('document_types', 'document_types.id', '=', 'documents.type_id')->orderBy('documents.id', 'desc')
            ->select(['documents.*', 'document_types.name as type_name'])->get();
        return View('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents_type = DocumentType::where('status', 1)->pluck('name', 'id')->prepend('Select One', '');
        return view('admin.documents.create', compact('documents_type'));
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
            'name'    => 'required|string',
            'type_id' => 'required|string',
            'status'  => 'required',
        ]);
        $file_name = $request->file;
        if (isset($request->is_downloadable) && $request->is_downloadable == 1) {
            $imageName = null;
            $file      = request()->file('file');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
            }
            if ($imageName != null) {
                $file->storeAs('/public/documents', $imageName);
                $file_name = '/documents/' . $imageName;
            }
        }

        $documents                  = new Document();
        $documents->name            = $request->name;
        $documents->type_id         = $request->type_id;
        $documents->description     = $request->description;
        $documents->file            = $file_name;
        $documents->is_downloadable = isset($request->is_downloadable) && $request->is_downloadable == 1 ? 1 : 0;
        $documents->status          = $request->status == 'active' ? 1 : 0;
        $documents->save();
        return redirect()->route('documents.index')
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
        $documents      = Document::find($id);
        $documents_type = DocumentType::where('status', 1)->pluck('name', 'id')->prepend('Select One', '');
        return view('admin.documents.edit', compact('documents_type', 'documents'));
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
            'name'    => 'required|string',
            'type_id' => 'required|string',
            'status'  => 'required',
        ]);

        $documents = Document::find($id);

        $file_name = $request->file;
        if (isset($request->is_downloadable) && $request->is_downloadable == 1) {
            $old_image_name = $documents->file;
            $imageName      = null;
            $file           = request()->file('file');
            if ($file != null) {
                $imageName = time() . '_' . $file->getClientOriginalName();
            }
            $file_name = $old_image_name;
            if ($imageName != null) {
                $file->storeAs('/public/documents', $imageName);
                $file_name = '/documents/' . $imageName;
            }
        }

        $documents->name            = $request->name;
        $documents->type_id         = $request->type_id;
        $documents->description     = $request->description;
        $documents->file            = $file_name;
        $documents->is_downloadable = isset($request->is_downloadable) && $request->is_downloadable == 1 ? 1 : 0;
        $documents->status          = $request->status == 'active' ? 1 : 0;
        $documents->save();
        return redirect()->route('documents.index')
            ->with('flash_success', "Data Update");
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

    public function getMimeType($type_id)
    {
        $documents_type = DocumentType::find($type_id);
        $data           = '*';
        if ($documents_type) {
            $data = $documents_type->mime_type;
        }
        return $data;

    }

    public function getDocumentsByType(Request $request)
    {
        $documents = DocumentType::whereIn('document_types.slug', $request->get('type'))
            ->with([
                'Document' => function ($query) {
                    $query->where('status',1);
                    $query->orderBy('sequence');
                }])
            ->get();
        return $documents;
    }
}
