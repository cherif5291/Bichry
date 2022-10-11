<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FacturesArticle;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacturesArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the facturesArticle can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list facturesarticles');
    }

    /**
     * Determine whether the facturesArticle can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FacturesArticle  $model
     * @return mixed
     */
    public function view(User $user, FacturesArticle $model)
    {
        return $user->hasPermissionTo('view facturesarticles');
    }

    /**
     * Determine whether the facturesArticle can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create facturesarticles');
    }

    /**
     * Determine whether the facturesArticle can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FacturesArticle  $model
     * @return mixed
     */
    public function update(User $user, FacturesArticle $model)
    {
        return $user->hasPermissionTo('update facturesarticles');
    }

    /**
     * Determine whether the facturesArticle can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FacturesArticle  $model
     * @return mixed
     */
    public function delete(User $user, FacturesArticle $model)
    {
        return $user->hasPermissionTo('delete facturesarticles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FacturesArticle  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete facturesarticles');
    }

    /**
     * Determine whether the facturesArticle can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FacturesArticle  $model
     * @return mixed
     */
    public function restore(User $user, FacturesArticle $model)
    {
        return false;
    }

    /**
     * Determine whether the facturesArticle can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\FacturesArticle  $model
     * @return mixed
     */
    public function forceDelete(User $user, FacturesArticle $model)
    {
        return false;
    }
}
