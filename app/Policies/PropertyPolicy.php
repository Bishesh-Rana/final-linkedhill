<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $user)
    {
        if ($user->isSuperAdmin() || $this->getPermission($user, 'list')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, Property $property)
    {
        if ($user->isSuperAdmin() || ($this->getPermission($user, 'read') && $user->id === $property->admin_id)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        if ($user->isSuperAdmin() || $this->getPermission($user, 'create')) {
            // dd('okay');
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user, Property $property)
    {
        if ($user->isSuperAdmin() || ($this->getPermission($user, 'update') && $user->id === $property->admin_id)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user, Property $property)
    {
        // dd($property);
        if ($user->isSuperAdmin() || ($this->getPermission($user, 'delete') && $user->id === $property->admin_id)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, Property $property)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, Property $property)
    {
        //
    }

    protected function getPermission($user, $p_title)
    {
        // dd($user);
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->for === 'property') {
                    if ($permission->name === $p_title) {
                        // dump($permission->name);
                        return true;
                    }
                }
            }
        }
        // die;
        return false;
    }
}
