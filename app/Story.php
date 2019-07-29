<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Story extends Model
{
    public $table = "stories";

    protected $fillable = [
        'category_id','name','title', 'writer','publisher','designer','talker','abstract','age','view_count','download_count','pic_name','voice_name'
    ];
    protected $appends=['section_body','image_url'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class,'favorites','story_id','user_id');
    }

    public function downloads()
    {
        return $this->belongsToMany(User::class,'downloads','story_id','user_id');
    }

    public function storyHistories()
    {
        return $this->belongsToMany(User::class,'story_histories','story_id','user_id');
    }

    public function getSectionBodyAttribute()
    {
        return Str::words($this->abstract,3);
    }

    public function storeFile($pic=null)
    {
        if (!empty($pic))
        {
            $picName = $pic->store('public/upload','asset');
            $storyPic = pathinfo($picName, PATHINFO_BASENAME);
            $this->update([
                'pic_name' => $storyPic
            ]);
        }
    }

    public function storeVoice($voice=null)
    {
        if (!empty($voice))
        {
            $voiceName = $voice->store('public/voice','asset');
            $storyVoice = pathinfo($voiceName, PATHINFO_BASENAME);
            $this->update([
                'voice_name' => $storyVoice
            ]);
        }
    }

    public function downloadCount()
    {
        return $this->downloads()->count();
    }

    public function getImageUrlAttribute()
    {
        if(!empty($this->pic_name)){
            $url = URL('') . "/story/pic/".$this->pic_name;
            return $url;
        }else
        {
            return null;
        }

    }

}
