<?php

namespace App\Livewire\Forms;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    #[Validate('required|string')]
    public string $name = '';

    #[Validate('required|string|digits:16')]
    public string $nuptk = '';

    #[Validate('boolean')]
    public bool $remember = false;

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only(['nuptk','name','email', 'password']), $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'form.email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());

        $user = Auth::user();
        session()->regenerate();

        // echo "hai";

        if($user->role === 'admin'){
            // session()->regenerate();
            redirect()->intended(route('admin.dashboard', absolute: false));
            return;

        }
        elseif($user->role === 'guru'){
            // session()->regenerate();
            redirect()->intended(route('guru.dashboard',absolute: false));
            return;
        }
        elseif($user->role === 'piket'){
            // session()->regenerate();
            redirect()->intended(route('piket.dashboard',absolute: false));
            return;
        }
        elseif($user->role === 'sekre'){
            // session()->regenerate();
            redirect()->intended(route('sekre.dashboard',absolute: false));
            return;
        }
        else{
            // redirect()->intended(route('dashboard',absolute:false));
            // return;
        }
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'form.email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}
