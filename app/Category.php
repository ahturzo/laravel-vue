<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public function post()
    {
        return $this->hasMany('App\Post', 'category_id');
    }
}
