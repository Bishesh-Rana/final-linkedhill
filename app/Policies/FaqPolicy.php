<?php

namespace App\Policies;

use App\Models\Faq;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        if ($admin->isSuperAdmin() || $this->getPermission($admin, 'list')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, Faq $faq)
    {
        if ($admin->isSuperAdmin() || ($this->getPermission($admin, 'read'))) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        if ($admin->isSuperAdmin() || ($this->getPermission($admin, 'create'))) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Faq $faq)
    {
        if ($admin->isSuperAdmin() || ($this->getPermission($admin, 'update'))) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Faq $faq)
    {
        if ($admin->isSuperAdmin() || ($this->getPermission($admin, 'delete'))) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Faq $faq)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Faq $faq)
    {
        //
    }


    protected function getPermission($admin, $p_title)
    {
        // dd($admin);
        foreach ($admin->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->for === 'faq') {
                    if ($permission->name === $p_title) {
                        return true;
                    }
                }
            }
        }
        // die;
        return false;
    }
}
