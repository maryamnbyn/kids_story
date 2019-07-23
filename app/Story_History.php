<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story_History extends Model
{
    public $table = "story_histories";

    protected $fillable = [
        'story_id', 'user_id'
    ];
}
