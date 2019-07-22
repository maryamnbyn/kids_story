<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Comment extends Model
{
    public $table = 'comments' ;
    protected  $fillable = ['user_id','story_id','body'];


}
