<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [ //campos para el form
        'name', 'slug', 'body', 'image_path'
    ];

    public $timestamps = false;

    //relations

    //relaciono categoria con entrada (1->N)
    public function entries() {
        return $this->hasMany(Entry::class);
    }
}
