<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function GuzzleHttp\Promise\all;

class PromotionController extends Controller
{
    public function index()
    {
        $allPromotions = Promotion::get();
        return view('admin.promotion.index', ['allPromotions' => $allPromotions]);
    }

    public function create()
    {
        return view('admin.promotion.new-promotion');
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'promotion_code' => [
                'required',
                Rule::unique('promotions')->where(function ($query) {
                    return $query->where('status', 1);
                }),
            ],
            "percentage" => "required_with:is_percentage",
            "fixed_amount" => 'required_without:is_percentage',
            "max_amount" => "nullable",
            "end_date" => "required",
            "min_purchase" => "nullable",
            "status" => "required",
        ]);

        $validated['is_percentage'] = isset($request->is_percentage) ? 1 : 0;
        if ($validated['is_percentage'] == 1) {
            $validated['fixed_amount'] = null;
        } elseif ($validated['is_percentage'] == 0) {
            $validated['percentage'] = null;
        }
        $validated['status'] = ($request->status == 'active') ? 1 : 0;
        $validated['start_date'] = date("Y-m-d");
        $promotionStore = Promotion::create($validated);
        return redirect()->route('promotion.index')->with('flash_success', 'New promotion info saved!');
    }
    public function edit($id)
    {
        $promotion_data = Promotion::find($id);
        return View('admin.promotion.edit-promotion', compact('promotion_data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $this->validate($request, [
            'promotion_code' => [
                'required',
                Rule::unique('promotions')->where(function ($query)use($id) {
                    return $query->where('status', 1)
                        ->where('id','<>',$id);
                }),
            ],
            "percentage" => "required_with:is_percentage",
            "fixed_amount" => 'required_without:is_percentage',
            "max_amount" => "nullable",
            "end_date" => "required",
            "min_purchase" => "nullable",
            "status" => "required",
        ]);
        $validated['is_percentage'] = isset($request->is_percentage) ? 1 : 0;
        if ($validated['is_percentage'] == 1) {
            $validated['fixed_amount'] = null;
        } elseif ($validated['is_percentage'] == 0) {
            $validated['percentage'] = null;
        }
        $validated['status'] = ($request->status == 'active') ? 1 : 0;
        $validated['start_date'] = date("Y-m-d");

        $promotionStore = Promotion::where('id', $id)->update($validated);
        return redirect()->route('promotion.index')->with('message', 'Promotion info updated!');
    }

    public function inactivePromotionCode($promotion_code)
    {
        DB::update('UPDATE promotions SET status = 0 WHERE promotion_code = ? ', [$promotion_code]);
        return redirect()->back();
    }
}
