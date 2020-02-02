<?php
namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Requests\StoreResetPassword;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Auth;

class PasswordService
{
    private $response;

    /**
     * @var PasswordBroker
     */
    private $passwordBroker;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(PasswordBroker $passwordBroker, UserRepositoryInterface $userRepository)
    {
        $this->passwordBroker = $passwordBroker;
        $this->userRepository = $userRepository;
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
        $this->userRepository->resetPassword($user, $password);
        event(new PasswordReset($this->userRepository->get()));
        $this->guard()->login($this->userRepository->get());
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
