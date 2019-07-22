<?php

namespace App\Http\Controllers\API\V1;

use App\Comment;
use App\Http\Requests\comment\createCommentRequest;
use App\Http\Requests\comment\getCommentRequest;
use App\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ResponseJson;

class commentController extends Controller
{
    public function index(getCommentRequest $request)
    {
        $comments = Comment::where('story_id' , $request->story_id)->get();
        return ResponseJson::data($comments)->get();
    }

    public function store(createCommentRequest $request)
    {
       $user = Auth::user() ;

       Comment::create([
           'user_id' => $user->id,
           'story_id' => $request->story_id,
           'body' => $request->body,
       ]);
        return ResponseJson::get();
    }
}
