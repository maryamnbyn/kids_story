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
    protected $appends=['section_body'];

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


//    public function scopeFavorited($query)
//    {
//        return $query->where('end_date_of_warranty', '<', Carbon::now());
//    }
//
//    public function scopeAll($query)
//    {
//        return $query->first();
//    }
//
//    public function scopeDownloaded($query)
//    {
//        return $query->where('end_date_of_warranty', '>', Carbon::now());
//    }
//
//    public function scopeHistory($query)
//    {
//        return $query->whereBetween('end_date_of_warranty', [Carbon::now(), Carbon::now()->addMonths(2)]);
//    }
}
