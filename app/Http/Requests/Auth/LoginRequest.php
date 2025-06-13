<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'login_identifier' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'login_identifier.required' => 'Email/NIS/NIP wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ];
    }

    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        $identifier = $this->input('login_identifier');
        $password = $this->input('password');

        // Cari user berdasarkan identifier (email, NISN, atau NIP)
        $user = $this->findUserByIdentifier($identifier);

        // Jika user tidak ditemukan atau password salah
        if (!$user || !Hash::check($password, $user->password)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'login_identifier' => 'Email/NISN/NIP atau password yang Anda masukkan salah.',
            ]);
        }

        // Login user
        Auth::login($user, $this->boolean('remember'));

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Cari user berdasarkan email, NISN, atau NIP
     */
    private function findUserByIdentifier($identifier)
    {
        // Coba cari berdasarkan email dulu
        $user = User::where('email', $identifier)->first();

        if ($user) {
            return $user;
        }

        // Jika tidak ketemu, cari berdasarkan NIS di tabel siswa
        $user = User::whereHas('siswa', function ($query) use ($identifier) {
            $query->where('nis', $identifier);
        })->first();

        if ($user) {
            return $user;
        }

        // Jika masih tidak ketemu, cari berdasarkan NIP di tabel guru
        $user = User::whereHas('guru', function ($query) use ($identifier) {
            $query->where('nip', $identifier);
        })->first();

        return $user;
    }

    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'login_identifier' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey()
    {
        return Str::transliterate(Str::lower($this->input('login_identifier')) . '|' . $this->ip());
    }
}
