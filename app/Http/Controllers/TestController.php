<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabelStorages;
use Illuminate\Support\Facades\Redirect;

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

        if ($request->has('KeepForIndex')) {
            return Redirect::route('index');
        }
        return Redirect::route('question');
    }
}
