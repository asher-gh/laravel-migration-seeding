<?php

namespace App\Policies;

use App\Models\Collection;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use PHPUnit\TestRunner\TestResult\Collector;

class CollectionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Collection $collection): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->created_at < now()->subMinutes(5);
    }

    /**
     * Who?
     *  - Users can edit their own collection
     *  - Administrators can edit the collection for users that they administer
     *      ? Admin belonging to the same company as the user
     * 
     * Determine whether the user can update the model.
     */
    public function update(User $user, Collection $collection): bool
    {
        return $collection->user->is($user);
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Collection $collection): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Collection $collection): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Collection $collection): bool
    {
        //
    }
}
