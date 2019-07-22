<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\Story\getProductRequest;
use App\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $products = Story::where('name', 'LIKE', '%' . $request->search . '%')->get();

        return ResponseJson::data($products)->get();

    }

    public function show(Story $story)
    {
        if (Auth::user()->id != $story->user_id) {

            return ResponseJson::code(-1)->message('عدم دسترسی')->get();

        }
        return ResponseJson::data($story)->get();

    }

    public function index(getProductRequest $request)
    {
        $user = Auth::user();

        $stories = Story::where('user_id', $user->id);

        switch ($request->status)
        {
            case    'favorited':
                $show_story = $stories->favorited()->paginate(config('page.paginate_page'));
                break;
            case    'downloaded':
                $show_story = $stories->downloaded()->paginate(config('page.paginate_page'));
                break;
            case    'history':
                $show_story = $stories->history()->paginate(config('page.paginate_page'));
                break;
            case    'all':
                $show_story = $stories->all()->paginate(config('page.paginate_page'));
                break;
        }

        return response()->json([
            "code" => $this->successStatus,
            "message" => "نمایش همه محصولات",
            "data" => collect($show_story->items())
                ->map(function ($product) {

                    return collect($product)->except([
                            'created_at',
                            'updated_at'
                        ]
                    );
                }),
            "has_more" => $show_product->hasMorePages()
        ]);

    }
}
