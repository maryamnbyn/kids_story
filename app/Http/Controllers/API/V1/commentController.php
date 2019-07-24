<?php

namespace App\Http\Controllers\API\V1;

use App\Comment;
use App\Http\Requests\comment\createCommentRequest;
use App\Story;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ResponseJson;

class commentController extends Controller
{
    public function index(Story $story)
    {
        $comments = Comment::where('story_id' , $story->id)->get()->map(function ($comment) {
            return $comment->zip();
        });

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
