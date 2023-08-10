<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function way(){
        return $this->belongsTo('App\Models\Way');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }
}
