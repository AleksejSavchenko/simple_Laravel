<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'desc', 'user_id', 'text'];

//    protected $hidden = ['user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
