<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    public $table = "voices";

    protected $fillable = ['name'];
}
