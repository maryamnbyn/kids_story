<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\category\storeCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('panel.category.create', compact('categories'));
    }

    public function show()
    {
        
    }


    public function store(storeCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->back();

    }

    public function destroy(Category $category)
    {
        if ($category != null) {
            $category->delete();
            return redirect()->back();
        }
    }

    public function test()
    {
        $categories = Category::all();
        return view('panel.category.a', compact('categories'));
    }

}
