<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate;

class Post extends Illuminate\Database\Eloquent\Model
{
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
