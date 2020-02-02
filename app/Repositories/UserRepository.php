<?php
namespace App\Repositories;

use App\Model\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Requests\StoreRegisterUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as BaseUser;
use Illuminate\Support\Str;

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

    public function resetPassword(BaseUser $user, string $password): void
    {
        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param array $credentials
     * @return bool
     */
    public function userExistAndHasRole(array $credentials): bool
    {
        return null !== User::where('email', $credentials['email'])
                ->whereIn('role', User::getUserPrivilegesRoles())->first();
    }
}
