<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [ //campos para form
      'user_id', 'category_id', 'date', 'name', 'slug', 'excerpt', 'body'
    ];

    //relations

    //relaciono entrada con usuario (N->1)
    public function user() {
        return $this->belongsTo(User::class);
    }

    //relaciono entrada con categoria (N->1)
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
