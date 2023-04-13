<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Movie extends Model
{
    use HasFactory;

    public function director(): BelongsTo
    {#
        return $this->belongsTo(Director::class);
    }

    // Genres?
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }
}
