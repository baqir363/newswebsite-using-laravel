<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //

    public function news()
    {
        return $this->belongsTo(\App\Models\News::class);
    }
}
