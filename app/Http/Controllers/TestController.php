<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabelStorages;

class TestController extends Controller
{


    public function register(Request $request)
    {
        $input_data = $request->all();

        foreach ($input_data['labelstorages_id'] as $key => $value) {
            $user_info = LabelStorages::select('*')->find($key);
            $user_info->select = $value;
            $user_info->save();
        }
        //        Log::info($request);
        return view('santaku.index');
    }
}
