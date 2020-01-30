<?php
namespace App\Services;

use App\Model\User;
use App\Requests\StoreRegisterUser;
use App\Events\Registered;
use Illuminate\Support\Facades\Hash;


class UserService
{
    public $user;

    public function createUser(StoreRegisterUser $storeRegisterUser)
    {
        $this->user = User::create([
            'name' => $storeRegisterUser['name'],
            'email' => $storeRegisterUser['email'],
            'password' => Hash::make($storeRegisterUser['password']),
        ]);
        event(new Registered($this->user));
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
