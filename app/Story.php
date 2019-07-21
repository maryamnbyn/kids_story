<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public $table = "stories";

    protected $fillable = [
        'category_d', 'writer','publisher','designer','talker','abstract','age','view_count','download_count','download_link'
    ];
}
