<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        // 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // defining a relationship function that links this collection, to the movies associated with it
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
