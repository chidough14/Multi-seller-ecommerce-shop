<?php

namespace App\Policies;

use App\User;
use App\shop;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    public function before (User $user, $ability) {
        if($user->hasRole('admin')) {
            return true;
        }
    }

    public function browse (User $user) {
       return $user->hasRole('seller');
    }


    public function read (User $user, shop $shop) {
        return $user->id == $shop->user_id;
     }


    /**
     * Determine whether the user can create shops.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function edit(User $user, shop $shop)
    {
        return $user->id == $shop->user_id;
    }

    public function add(User $user)
    {
        //
    }



    public function delete(User $user, shop $shop)
    {
        return $user->id == $shop->user_id;
    }

}
