<?php
namespace App\Repositories\Contracts;

use App\Requests\StoreRegisterUser;
use Illuminate\Foundation\Auth\User as BaseUser;

interface UserRepositoryInterface
{
    public function create(StoreRegisterUser $storeRegisterUser): void;

    public function get(): ?BaseUser;
}
