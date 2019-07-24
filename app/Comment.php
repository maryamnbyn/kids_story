<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Comment extends Model
{
    public $table = 'comments' ;
    protected  $fillable = ['user_id','story_id','body'];
    protected  $appends = ['user_name'];

    public function zip()
    {
        return $this->only([
            'body',
            'user_name',
            'created_at'
        ]);
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
}
}
