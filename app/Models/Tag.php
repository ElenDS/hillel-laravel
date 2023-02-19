<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate;

class Tag extends Illuminate\Database\Eloquent\Model
{
    public function posts() {
        return $this->belongsToMany('App\Models\Post');
    }
}
