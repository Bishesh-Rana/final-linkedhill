<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $user, $arg)
    {
        if ($arg === 'blog') {
            if ($user->isSuperAdmin() || ($this->getBlogPermission($user, 'list'))) {
                return true;
            }
        }
        if ($user->isSuperAdmin() || ($this->getNewsPermission($user, 'list'))) {
            // dd($arg);
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, Blog $blog, $arg)
    {
        if ($arg === 'blog') {

            if ($user->isSuperAdmin() || ($this->getBlogPermission($user, 'read'))) {
                return true;
            }
        }
        if ($user->isSuperAdmin() || ($this->getNewsPermission($user, 'read'))) {
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
    public function create(Admin $user, $arg)
    {
        if ($arg === 'blog') {

            if ($user->isSuperAdmin() || $this->getBlogPermission($user, 'create')) {
                return true;
            }
        }
        if ($user->isSuperAdmin() || $this->getNewsPermission($user, 'create')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user, Blog $blog, $arg)
    {
        if ($arg === 'blog') {

            if ($user->isSuperAdmin() || $this->getBlogPermission($user, 'update')) {
                return true;
            }
        }
        if ($user->isSuperAdmin() || $this->getNewsPermission($user, 'update')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user, Blog $blog, $arg)
    {
        if ($arg == 'blog') {
            # code...
            if ($user->isSuperAdmin() || ($this->getBlogPermission($user, 'delete'))) {
                return true;
            }
        }
        if ($user->isSuperAdmin() || $this->getNewsPermission($user, 'delete')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, Blog $blog)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, Blog $blog)
    {
        //
    }

    protected function getBlogPermission($user, $p_title)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->for === 'blog') {
                    if ($permission->name === $p_title) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    protected function getNewsPermission($user, $p_title)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->for === 'news') {
                    if ($permission->name === $p_title) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
