<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }
    
    public function view(User $user, User $model)
    {
        return true;
    }

    public function create(User $user): bool
    {
        return in_array($user->type, UserType::adminOrManager());
    }

    public function update(User $user, User $model): bool
    {
        if ($user->id == $model->id) {
            return true;
        }
        return in_array($user->type, UserType::adminOrManager());
    }

    public function delete(User $user, User $model): bool
    {
        if ($user->id == $model->id) {
            return true;
        }
        return in_array($user->type, UserType::adminOrManager());
    }
}
