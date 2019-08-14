<?php

namespace App\Http\Controllers\API\V1;

use App\Download;
use App\Favorite;
use App\Http\Requests\story\downloadStoryRequest;
use App\Http\Requests\story\favoriteStoryRequest;
use App\Http\Requests\story\historyStoryRequest;
use App\Http\Requests\story\searchRequest;
use App\Story;
use App\Story_History;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use ResponseJson;


class StoryController extends Controller
{
    public function search(searchRequest $request)
    {
        $products = Story::where('name', 'LIKE', '%' . $request->search . '%')->get();

        return ResponseJson::data($products)->get();

    }

    public function show(Story $story)
    {
        return ResponseJson::data($story)->get();
    }

    public function index()
    {
        $all_story = Story::all();

        return ResponseJson::data($all_story)->get();
    }

    public function setFavorite(favoriteStoryRequest $request)
    {
        $story_id = Story::where('id', $request->story_id)->first();

        if ($story_id instanceof Story) {

            Favorite::firstOrCreate([
                    'user_id' => Auth::user()->id,
                    'story_id' => $request->story_id
                ]
            );

            return ResponseJson::get();

        }

        return ResponseJson::code(-1)->message(' موجود نمی باشد id این')->get();
    }

    public function getFavorite()
    {
        $user = auth()->user()->favorites->map(function ($item) {
            return collect($item)->except(['pivot'])->toArray();
        });;

        return ResponseJson::data($user)->get();
    }

    public function setDownload(downloadStoryRequest $request)
    {
        $story_id = Story::find($request->story_id);

        if ($story_id instanceof Story) {

            Download::firstOrCreate([
                    'user_id' => Auth::user()->id,
                    'story_id' => $request->story_id]
            );

            return ResponseJson::get();

        }

        return ResponseJson::code(-1)->message(' موجود نمی باشد id این')->get();
    }

    public function getDownload()
    {
        $user = auth()->user()->favorites->map(function ($item) {
            return collect($item)->except(['pivot'])->toArray();
        });;

        return ResponseJson::data($user)->get();
    }

    public function setHistory(historyStoryRequest $request)
    {
        $story_id = Story::where('id', $request->story_id)->first();

        if ($story_id instanceof Story) {

            Story_History::firstOrCreate([
                    'user_id' => Auth::user()->id,
                    'story_id' => $request->story_id]
            );

            return ResponseJson::get();

        }

        return ResponseJson::code(-1)->message(' موجود نمی باشد id این')->get();

    }

    public function getHistory()
    {
        $user = auth()->user()->storyHistories->take(3)->map(function ($item) {
            return collect($item)->except(['pivot'])->toArray();
        });

        return ResponseJson::data($user)->get();
    }

}
