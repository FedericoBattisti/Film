<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}