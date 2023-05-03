<?php

namespace App\Policies;

use App\Models\Repairment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepairmentPolicy
{
    use HandlesAuthorization;

    // Viewing one specific data only
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Repairment  $repairment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Repairment $repairment)
    {
        return TRUE;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Repairment  $repairment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Repairment $repairment)
    {
        return $user->id == $repairment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Repairment  $repairment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Repairment $repairment)
    {
        return $user->id == $repairment->user_id;
    }

}
