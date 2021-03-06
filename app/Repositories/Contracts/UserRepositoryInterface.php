<?php
namespace App\Repositories\Contracts;

use App\Http\Requests\UpdateRole;
use App\Requests\StoreRegisterUser;
use Illuminate\Foundation\Auth\User as BaseUser;

interface UserRepositoryInterface
{
    public function create(StoreRegisterUser $storeRegisterUser): void;

    public function get(): ?BaseUser;

    public function resetPassword(BaseUser $user, string $password): void;

    public function userExistAndHasRole(array $credentials): bool;

    public function editRole(UpdateRole $role): void;
}
