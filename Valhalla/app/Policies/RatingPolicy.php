<?php

namespace App\Policies;

use App\Models\Rating;
use Illuminate\Auth\Access\Response;
use App\Models\User;
use App\Models\Orders;
class RatingPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function view(User $user, Orders $order)
    {
        return $order->product_id && $order->user_id === $user->id;
    }
//    public function viewAny(User $user): bool
//    {
        //
//    }

    /**
     * Determine whether the user can view the model.
     */
//    public function view(User $user, Rating $rating): bool
//    {
        //
//    }

    /**
     * Determine whether the user can create models.
     */
//    public function create(User $user): bool
//    {
        //
//    }

    /**
     * Determine whether the user can update the model.
     */
//    public function update(User $user, Rating $rating): bool
//    {
        //
//    }

    /**
     * Determine whether the user can delete the model.
     */
//    public function delete(User $user, Rating $rating): bool
//    {
        //
//    }

    /**
     * Determine whether the user can restore the model.
     */
//    public function restore(User $user, Rating $rating): bool
//    {
        //
//    }

    /**
     * Determine whether the user can permanently delete the model.
     */
//    public function forceDelete(User $user, Rating $rating): bool
//    {
        //
//    }

}
