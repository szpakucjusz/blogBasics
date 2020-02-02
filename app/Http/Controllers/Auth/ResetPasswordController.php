<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Requests\StoreResetPassword;
use App\Services\PasswordService;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);
    }

    /**
     * Reset the given user's password.
     *
     * @param \App\Requests\StoreResetPassword $request
     * @param PasswordService $passwordService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(StoreResetPassword $request, PasswordService $passwordService)
    {
        $passwordService->reset($request);
        $response = $passwordService->response();
        return $response === Password::PASSWORD_RESET ? redirect($this->redirectPath())->with('status', trans($response)):
            redirect()->back()->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
    }
}
