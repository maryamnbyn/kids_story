<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
   public $table= "paragraphs";
    protected $fillable = [
        'number','content'
    ];
}
