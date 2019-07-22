<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ResponseJson;

class commentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return ResponseJson::data($comments)->get();

    }
}
