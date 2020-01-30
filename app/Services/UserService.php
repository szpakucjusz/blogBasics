<?php
namespace App\Services;

use App\Http\Requests\StorePost;
use App\Model\Image;
use App\Model\Post;
use App\Model\User;
use App\Requests\StoreRegisterUser;
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
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
