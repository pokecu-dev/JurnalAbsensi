<?php

namespace App\Policies;

use App\Models\DetailJurnal;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DetailJurnalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DetailJurnal $detailJurnal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DetailJurnal $detailJurnal): bool
    {

        $jurnal = $detailJurnal->jurnal;

        if (!$jurnal) {
            return false;
        }

        return $user->hasRole('admin')
            || $user->hasRole('sekre')
            || (
                $user->hasRole('guru')
                && $jurnal->teacher_id === $user->id
            );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DetailJurnal $detailJurnal): bool
    {
        return $user->hasRole('admin');
        // return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DetailJurnal $detailJurnal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DetailJurnal $detailJurnal): bool
    {
        return false;
    }
}
