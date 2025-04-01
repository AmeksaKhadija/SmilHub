<?php

namespace App\Policies;

use App\Models\Patients;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Patients $patients)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Patients $patients)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Patients $patients)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Patients $patients)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Patients $patients)
    {
        //
    }
}
