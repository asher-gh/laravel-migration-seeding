<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\User;

class CommentStorer
{
    public function storeComment(User $user, $commentable, string $text): Comment
    {
        return $commentable->comments()->create([
            'user_id' => $user->id,
            'text' => $text
        ]);
    }
}