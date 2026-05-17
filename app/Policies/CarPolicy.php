<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;

class CarPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Car $car): bool
    {
        if ($user->isAdmin() || $user->isViewer()) {
            return true;
        }

        // user sees car only if they own the car's owner
        return $car->owner->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Car $car): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $car->owner->user_id === $user->id;
    }

    public function delete(User $user, Car $car): bool
    {
        return $user->isAdmin();
    }
}
