<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Story extends Model
{
    public $table = "stories";

    protected $fillable = [
        'category_id', 'name', 'title', 'writer', 'publisher',
        'designer', 'talker', 'abstract', 'age', 'view_count',
        'download_count', 'pic_name', 'voice_name'
    ];

    protected $appends = ['section_body', 'images'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function voice()
    {
        return $this->belongsTo(Voice::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'story_id', 'user_id');
    }

    public function downloads()
    {
        return $this->belongsToMany(User::class, 'downloads', 'story_id', 'user_id');
    }

    public function storyHistories()
    {
        return $this->belongsToMany(User::class, 'story_histories', 'story_id', 'user_id');
    }

    public function getSectionBodyAttribute()
    {
        return Str::words($this->abstract, 3);
    }

    public function storeFile($pic = null, $time = null)
    {
        foreach ($pic as $key => $item) {
            if (!empty($item)) {
                $picName = $item->store('public/upload', 'asset');
                $storyPic = pathinfo($picName, PATHINFO_BASENAME);
                $this->images()->create([
                    'name' => $storyPic,
                    'pic_time' => $time[$key]
                ]);
            }
        }

    }

    public function getImagesAttribute()
    {
        return $this->images()->get()->map(function ($image) {
            return $urlImages[] = URL('') . "/story/pic/" . $image->name;
        });
    }

    public function getVoicesAttribute()
    {
        return $this->images()->get()->map(function ($voice) {
            return $urlImages[] = URL('') . "/story/pic/" . $voice->name;
        });
    }

    public function storeVoice($voice = null)
    {
        if (!empty($voice)) {
            $voiceName = $voice->store('public/voice', 'asset');
            $storyVoice = pathinfo($voiceName, PATHINFO_BASENAME);
            $this->update([
                'voice_name' => $storyVoice
            ]);
        }
    }

    public function updateFile($pic = null)
    {
        if (!empty($pic)) {
            if (!empty($this->pic_name)) {

                unlink('storage/public/upload/' . $this->pic_name);
                $picName = $pic->store('public/upload', 'asset');
                $storyPic = pathinfo($picName, PATHINFO_BASENAME);

                $this->update([
                    'pic_name' => $storyPic
                ]);
            } else {

                $picName = $pic->store('/public/upload', 'asset');
                $storyPic = pathinfo($picName, PATHINFO_BASENAME);

                $this->update([
                    'pic_name' => $storyPic
                ]);
            }
        }
    }

    public function updateStore($pic = null)
    {
        if (!empty($pic)) {
            if (!empty($this->voice_name)) {

                unlink('storage/public/upload/' . $this->voice_name);
                $voiceName = $pic->store('public/upload', 'asset');
                $storyVoice = pathinfo($voiceName, PATHINFO_BASENAME);

                $this->update([
                    'voice_name' => $storyVoice
                ]);
            } else {

                $voiceName = $pic->store('/public/upload', 'asset');
                $storyVoice = pathinfo($voiceName, PATHINFO_BASENAME);

                $this->update([
                    'voice_name' => $storyVoice
                ]);
            }
        }
    }

    public function downloadCount()
    {
        return $this->downloads()->count();
    }

}
