<?php

namespace App\Policies;

use App\User;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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


    public function read (User $user, Product $Product) {
        if(empty($Product->shop)) {
            return false;
        }
        return $user->id == $Product->shop->user_id;
     }


    /**
     * Determine whether the user can create Products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function edit(User $user, Product $Product)
    {
        if(empty($Product->shop)) {
            return false;
        }
        return $user->id == $Product->shop->user_id;
    }

    public function add(User $user)
    {
        return $user->hasRole('seller');
    }



    public function delete(User $user, Product $Product)
    {
        if(empty($Product->shop)) {
            return false;
        }
        return $user->id == $Product->shop->user_id;
    }

}
