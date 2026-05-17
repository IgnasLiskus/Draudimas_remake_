<?php

namespace App\Policies;

use App\Models\Owner;
use App\Models\User;

class OwnerPolicy
{
    // Can see the owner at all?
    public function view(User $user, Owner $owner): bool
    {
        if ($user->isAdmin() || $user->isViewer()) {
            return true;                        // admin & viewer see all
        }

        return $owner->user_id === $user->id;   // user sees only own
    }

    // Can see the full list?
    public function viewAny(User $user): bool
    {
        return true; // all roles can visit index (filtered in controller)
    }

    // Can create?
    public function create(User $user): bool
    {
        return true;                // only admin creates
    }

    // Can edit?
    public function update(User $user, Owner $owner): bool
    {
        if ($user->isAdmin()) {
            return true;                        // admin edits all
        }

        return $owner->user_id === $user->id;   // user & viewer edit only own
    }

    // Can delete?
    public function delete(User $user, Owner $owner): bool
    {
        return $user->isAdmin();                // only admin deletes
    }
}
