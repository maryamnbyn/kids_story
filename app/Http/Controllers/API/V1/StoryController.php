<?php

namespace App\Http\Controllers\API\V1;

use App\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use ResponseJson;


class StoryController extends Controller
{
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required',
        ]);

        if ($validator->fails()) {

            return ResponseJson::code(-1)->message($validator->errors()->first())->get();
        }

        $products = Story::where('name', 'LIKE', '%'.$request->search.'%')->get();

        return ResponseJson::data($products)->get();

    }
}