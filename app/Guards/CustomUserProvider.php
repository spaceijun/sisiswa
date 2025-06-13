<?php

namespace App\Guards;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\User;

class CustomUserProvider extends EloquentUserProvider
{
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) || (count($credentials) === 1 && array_key_exists('password', $credentials))) {
            return;
        }

        // Jika ada login_identifier, lakukan pencarian custom
        if (isset($credentials['login_identifier'])) {
            $identifier = $credentials['login_identifier'];

            // Cari user berdasarkan email, NIS, atau NIP
            $user = User::where('email', $identifier)
                ->orWhereHas('siswa', function ($query) use ($identifier) {
                    $query->where('nis', $identifier);
                })
                ->orWhereHas('guru', function ($query) use ($identifier) {
                    $query->where('nip', $identifier);
                })
                ->first();

            return $user;
        }

        // Fallback ke behavior default untuk kredensial lainnya
        return parent::retrieveByCredentials($credentials);
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // Validasi password menggunakan hasher
        $plain = $credentials['password'];
        return $this->hasher->check($plain, $user->getAuthPassword());
    }
}
