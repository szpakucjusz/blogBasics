<?php
namespace App\Repositories;

use App\Model\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Requests\StoreRegisterUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as BaseUser;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $user;

    public function create(StoreRegisterUser $storeRegisterUser): void
    {
        $this->user = User::create([
            'name' => $storeRegisterUser['name'],
            'email' => $storeRegisterUser['email'],
            'password' => Hash::make($storeRegisterUser['password']),
        ]);
    }

    public function get(): ?BaseUser
    {
        return $this->user;
    }
}
