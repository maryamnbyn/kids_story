<?php

namespace App\Http\Controllers\API\V1;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ResponseJson;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return ResponseJson::data($categories)->get();
    }
}
