<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $table = "favorites";

    protected $fillable = [
        'story_id', 'user_id'
    ];
}
