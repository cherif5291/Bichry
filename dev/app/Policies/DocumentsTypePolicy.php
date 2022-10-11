<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DocumentsType;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentsTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the documentsType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list documentstypes');
    }

    /**
     * Determine whether the documentsType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DocumentsType  $model
     * @return mixed
     */
    public function view(User $user, DocumentsType $model)
    {
        return $user->hasPermissionTo('view documentstypes');
    }

    /**
     * Determine whether the documentsType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create documentstypes');
    }

    /**
     * Determine whether the documentsType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DocumentsType  $model
     * @return mixed
     */
    public function update(User $user, DocumentsType $model)
    {
        return $user->hasPermissionTo('update documentstypes');
    }

    /**
     * Determine whether the documentsType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DocumentsType  $model
     * @return mixed
     */
    public function delete(User $user, DocumentsType $model)
    {
        return $user->hasPermissionTo('delete documentstypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DocumentsType  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete documentstypes');
    }

    /**
     * Determine whether the documentsType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DocumentsType  $model
     * @return mixed
     */
    public function restore(User $user, DocumentsType $model)
    {
        return false;
    }

    /**
     * Determine whether the documentsType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DocumentsType  $model
     * @return mixed
     */
    public function forceDelete(User $user, DocumentsType $model)
    {
        return false;
    }
}
