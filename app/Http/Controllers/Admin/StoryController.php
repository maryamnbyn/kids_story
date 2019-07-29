<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\story\storeStoryRequest;
use App\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('panel.story.create', compact('categories'));
    }

    public function index()
    {
        $stories = Story::paginate(config('page.paginate_page'));
        return view('panel.story.index', compact('stories'));
    }

    public function store(storeStoryRequest $request)
    {
       $story =  Story::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'title' => $request->title,
            'writer' => $request->writer,
            'age' => $request->age,
            'publisher' => $request->publisher,
            'designer' => $request->designer,
            'talker' => $request->talker,
            'abstract' => $request->abstract,
            'download_link' => 'dkmsdk'
        ]);
        $pic = Request()->file('storyPic');
        $story->storeFile($pic);

        $voice = Request()->file('storyVoice');
        $story->storeVoice($voice);

        return redirect()->back();

    }

    public function destroy(Story $story)
    {
        if ($story != null) {
            $story->delete();
            return redirect()->back();
        }
    }

    public function edit(Story $story)
    {
        $categories = Category::all();
        return view('panel.story.edit', compact('story', 'categories'));
    }

    public function update(Request $request, Story $story)
    {
        $story->update([
            'category_id' => $request->category,
            'name' => $request->name,
            'title' => $request->title,
            'writer' => $request->writer,
            'age' => $request->age,
            'publisher' => $request->publisher,
            'designer' => $request->designer,
            'talker' => $request->talker,
            'abstract' => $request->abstract,
            'download_link' => 'dkmsdk'
        ]);
        return redirect()->route('admin.stories.index');
    }
}
