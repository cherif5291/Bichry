<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Document;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the document can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list documents');
    }

    /**
     * Determine whether the document can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Document  $model
     * @return mixed
     */
    public function view(User $user, Document $model)
    {
        return $user->hasPermissionTo('view documents');
    }

    /**
     * Determine whether the document can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create documents');
    }

    /**
     * Determine whether the document can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Document  $model
     * @return mixed
     */
    public function update(User $user, Document $model)
    {
        return $user->hasPermissionTo('update documents');
    }

    /**
     * Determine whether the document can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Document  $model
     * @return mixed
     */
    public function delete(User $user, Document $model)
    {
        return $user->hasPermissionTo('delete documents');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Document  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete documents');
    }

    /**
     * Determine whether the document can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Document  $model
     * @return mixed
     */
    public function restore(User $user, Document $model)
    {
        return false;
    }

    /**
     * Determine whether the document can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Document  $model
     * @return mixed
     */
    public function forceDelete(User $user, Document $model)
    {
        return false;
    }
}
