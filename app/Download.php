<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    public $table = "downloads";

    protected $fillable = [
        'story_id', 'user_id'
    ];

}
