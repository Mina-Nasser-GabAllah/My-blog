<?php

namespace App\Policies;

use App\Models\Section;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class Section_po
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function before(User $user){
        if($user->role=='admin'){
            return true;
        }
    }

    public function control_post(User $user,Section $section)
    {
        if($user->id==$section->admin){
            return true;
        }
        return false;
    }
}
