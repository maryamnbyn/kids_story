<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = "images";
    protected $fillable = [
        'name','pic_time'
    ];


}
