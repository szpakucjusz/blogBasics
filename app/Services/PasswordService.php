<?php
namespace App\Services;

use App\Http\Requests\StorePost;
use App\Model\Image;
use App\Model\Post;
use App\Requests\StoreResetPassword;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordService
{
    private $response;

    /**
     * @var PasswordBroker
     */
    private $passwordBroker;

    public function __construct(PasswordBroker $passwordBroker)
    {
        $this->passwordBroker = $passwordBroker;
    }

    public function reset(StoreResetPassword $request): void
    {
        $this->response = $this->passwordBroker->reset(
            $request->credentials(), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );
    }

    public function response()
    {
        return $this->response;
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);
        $user->setRememberToken(Str::random(60));
        $user->save();
        event(new PasswordReset($user));
        $this->guard()->login($user);
    }

    /**
     * Set the user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);
    }
}
