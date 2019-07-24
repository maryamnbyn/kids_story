<?php

namespace App\Http\Controllers\API\V1;

use App\Category;
use App\Http\Requests\category\getCategoryStroryRequest;
use App\Story;
use App\Http\Controllers\Controller;
use ResponseJson;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return ResponseJson::data($categories)->get();
    }

    public function categoryStory(getCategoryStroryRequest $request)
    {
        $stories = Story::where('category_id', $request->category_id)->get();

        return ResponseJson::data($stories)->get();

    }
}
