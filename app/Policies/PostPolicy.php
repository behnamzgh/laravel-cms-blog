<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use function PHPUnit\Framework\returnSelf;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Post $post)
    {
        // yek policy baraye inke user poste gheyre poste khodesh ro natone hazf kone harchand
        // in bakhsh dar ghesmate PostController handle shode va post haye nevisande haye dg baraye
        // digari b namayesh dar nemiad serfan baraye ashnaii ba policy
        if($user->role === 'admin') return true;
        //agar id user barabar bod ba id nevisande post in policy pass mishe
        return $user->id === $post->user_id;
    }

}
