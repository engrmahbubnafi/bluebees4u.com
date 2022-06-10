<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AjaxController extends Controller
{


    public function columnSorting(Request $request)
    {

        $model = $request->get('model');
        $obj   = $request->get('obj');

        $ModelInstance = '\App\Models\\' . $model;

        if ($request->has('has_child')) {
            foreach ($obj as $key => $value) {
                $parentId = $value['id'];
                $ModelInstance::where('id',$value['id'])
                    ->update([
                        'sequence'  => $key,
                        'parent_id' => null,
                    ]);
                if (count($value['children'])) {
                    foreach ($value['children'] as $k => $v) {
                        $secoundLevelParentId=$v['id'];
                       $ModelInstance::where('id',$v['id'])
                            ->update([
                                'sequence'  => $k,
                                'parent_id' => $parentId,
                            ]);
                        if (count($v['children'])) {
                            foreach ($v['children'] as $kChild => $vChild) {
                                $ModelInstance::where('id',$vChild['id'])
                                    ->update([
                                        'sequence'  => $kChild,
                                        'parent_id' => $secoundLevelParentId,
                                    ]);
                            }
                        }
                    }
                }
            }
        } else {
            foreach ($obj as $key => $value) {
                $ModelInstance::where('id',$value['id'])
                    ->update(['sequence' => $key]);
            }
        }

        return response()->json([
            'error'   => 0,
            'message' => 'Successfully updated.',
        ]);
    }

}
