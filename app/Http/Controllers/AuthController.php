<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:4',
            'confirm_password' => 'required|string|same:password|min:4',
        ]);

        $user = User::create([
            'username' => $data['username'],
            'password' => $data['password'],
        ]);

        event(new Registered($user));

        $this->limiter()->hit($this->throttleKey($request));

        $this->guard()->login($user);

        return to_route('news.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required|string|min:4',
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {

            event(new Lockout($request));

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request)->with('success-popup', __('general.login_successfully'));
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required|string|min:4',
            'new_password' => 'required|string|min:4',
        ]);

        $user = auth()->user();

        if (Hash::check($data['old_password'], $user->password)){
            $user->password = $data['new_password'];
            $user->save();
        }

        return to_route('news.index');
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $loggedIn = $this->guard()->once($credentials);

        return $loggedIn && $this->guard()->attempt($credentials, $request->boolean('remember'));
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            $request->username => [trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ])],
        ])->status(Response::HTTP_TOO_MANY_REQUESTS);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->limiter()->clear($this->throttleKey($request));

        return to_route('news.index');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return back()
            ->withInput($request->only('username'))
            ->withErrors([$request->username => 'Authentication failed']);
    }

    public function logout()
    {
        $this->guard()->logout();

        return redirect(url()->previous());
    }

    protected function incrementLoginAttempts(Request $request): void
    {
        $this->limiter()->hit($this->throttleKey($request));
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts($this->throttleKey($request), 5);
    }

    protected function throttleKey(Request $request)
    {
        return Str::transliterate(Str::lower($request->input('username', $request->input('username'))) . '|' . $request->ip());
    }

    protected function limiter()
    {
        return app(RateLimiter::class);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
