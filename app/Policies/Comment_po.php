<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Comment_po
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function EditComment(User $user,Comment $comment){
        if($comment->user_id==$user->id){
            return true;
        }
        return false ;
    }
}
