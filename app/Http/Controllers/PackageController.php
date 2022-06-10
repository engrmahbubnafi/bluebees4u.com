<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Package;
use App\Models\PackageFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('packageFeature')->get();
        return view('admin.package.index', ['packages' => $packages]);

        return view('admin.new-package');
    }

    public function create()
    {
        return view('admin.package.new-package');
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "package_name" => "required",
            "price" => "required"
        ]);
        DB::beginTransaction();
        try {
            $package_doc_type = 'packages';
            $is_signup_able = isset($request->is_signup_able) && $request->is_signup_able == 1 ? 1 : 0;

            $documents_type = DocumentType::where('slug', $package_doc_type)->where('slug', $package_doc_type)->first();
            if (!$documents_type) {
                $documents_type = new DocumentType();
                $documents_type->name = $package_doc_type;
                $documents_type->slug = $package_doc_type;
                $documents_type->mime_type = '*';
                $documents_type->status = 1;
                $documents_type->save();
            }
            $priceSection = is_numeric($request->price) ? '<strong>Tk. ' . $request->price . '</strong><span>/MONTH</span>' : '<strong>' . $request->price . '</strong>';
            $document_description = '';
            if (!$is_signup_able) {
                $document_description .= '<p style="padding-bottom: 10px;margin-top: -10px;">(applicable only with main packages)</p>';
            }
            $document_description .= '<div class="price_table_row cost dark-bg">' . $priceSection . '</div>';
            if (count($request->package_features)) {
                foreach ($request->package_features as $data) {
                    $document_description .= '<div class="price_table_row">' . $data . '</div>';
                }
            }
            $documents = new Document();
            $documents->name = $request->package_name;
            $documents->type_id = $documents_type->id;
            $documents->description = $document_description;
            $documents->file = '';
            $documents->is_downloadable = 0;
            $documents->status = 1;
            $documents->save();
            $validated['is_signup_able'] = $is_signup_able;
            $validated['documents_id'] = $documents->id;
            $packageCreate = Package::create($validated);
            $document_description .= '<div class="price_table_btn"><a href="' . route('signup', ['package' => $packageCreate->id]) . '" class="btn btn-dark btn-lg btn-block">Sign Up</a></div>';
            $documents->description = $document_description;
            $documents->save();
            if (count($request->package_features)) {
                foreach ($request->package_features as $data) {
                    $package_features = new PackageFeature();
                    $package_features->feature_name = $data;
                    $package_features->package_id = $packageCreate->id;
                    $package_features->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('package.index')->with('flash_success', 'New package info saved!');
    }

    public function edit($id)
    {
        $packageData = Package::with('packageFeature')->find($id);
        $package_features = PackageFeature::where('package_id', $packageData->id)->get();
        return View('admin.package.edit', compact('packageData', 'package_features'));
    }

    public function update(Request $request, $id)
    {
        $validated = $this->validate($request, [
            "package_name" => "required",
            "price" => "required"
        ]);
        DB::beginTransaction();
        try {
            $package = Package::find($id);
            $is_signup_able = isset($request->is_signup_able) && $request->is_signup_able == 1 ? 1 : 0;
            $package_doc_type = 'packages';
            $documents_type = DocumentType::where('slug', $package_doc_type)->where('slug', $package_doc_type)->first();
            $priceSection = is_numeric($request->price) ? '<strong>Tk. ' . $request->price . '</strong><span>/MONTH</span>' : '<strong>' . $request->price . '</strong>';
            $document_description = '';
            if (!$is_signup_able) {
                $document_description .= '<p style="padding-bottom: 10px;margin-top: -10px;">(applicable only with main packages)</p>';
            }
            $document_description .= '<div class="price_table_row cost dark-bg">' . $priceSection . '</div>';
            if (count($request->package_features)) {
                foreach ($request->package_features as $data) {
                    $document_description .= '<div class="price_table_row">' . $data . '</div>';
                }
            }
            $document_description .= '<div class="price_table_btn"><a href="' . route('signup', ['package' => $package->id]) . '" class="btn btn-dark btn-lg btn-block">Sign Up</a></div>';
            $documents = Document::find($package->documents_id);
            $documents->name = $request->package_name;
            $documents->type_id = $documents_type->id;
            $documents->description = $document_description;
            $documents->save();
            $validated['documents_id'] = $documents->id;
            $validated['is_signup_able'] = $is_signup_able;
            Package::where('id', $id)->update($validated);

            PackageFeature::whereNotIn('id', $request->feature_id)
                ->where('package_id', $package->id)->delete();
            $featureExistArray = [];
            $featureNotExistArray = [];
            foreach ($request->package_features as $key => $data) {
                if (isset($request->feature_id[$key])) {
                    $featureExistArray[$request->feature_id[$key]] = $data;
                } else {
                    $featureNotExistArray[$key] = $data;
                }

            }
            if (count($featureExistArray)) {
                foreach ($featureExistArray as $key => $data) {
                    $package_features = PackageFeature::find($key);
                    $package_features->feature_name = $data;
                    $package_features->package_id = $package->id;
                    $package_features->save();
                }
            }
            if (count($featureNotExistArray)) {
                foreach ($featureNotExistArray as $data) {
                    $package_features = new PackageFeature();
                    $package_features->feature_name = $data;
                    $package_features->package_id = $package->id;
                    $package_features->save();
                }
            }

            DB::commit();
            return redirect()->route('package.index')->with('flash_success', 'New package info saved!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('package.index')->with('flash_danger', 'package info not updated!');
        }
    }
}
