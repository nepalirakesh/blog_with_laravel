<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['type'];

    public function posts(){
        return $this->HasMany('App\Models\Post');
    }
}
