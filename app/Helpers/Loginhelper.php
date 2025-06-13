<?php

namespace App\Helpers;

class LoginHelper
{
    public static function getLoginType($identifier)
    {
        // Cek apakah email
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }

        // Cek apakah NIS (minimal 5 digit)
        if (preg_match('/^\d{5,}$/', $identifier) && strlen($identifier) >= 5 && strlen($identifier) < 10) {
            return 'nis';
        }

        // Cek apakah NIP (minimal 6 digit atau format tertentu)
        // Format NIP bisa berupa: 123456, 1234567890123456, atau 12345678 123456 1 123
        if (preg_match('/^\d{6,}$/', $identifier) && strlen($identifier) >= 6) {
            return 'nip';
        }

        // Format NIP dengan spasi (contoh: 12345678 123456 1 123)
        if (preg_match('/^\d{8}\s\d{6}\s\d\s\d{3}$/', $identifier)) {
            return 'nip';
        }

        return 'unknown';
    }

    public static function getPlaceholderText()
    {
        return 'Masukkan Email (Admin/Orang Tua), NIS min. 5 digit (Siswa), atau NIP min. 6 digit (Guru)';
    }

    public static function getLoginLabel()
    {
        return 'Email / NIS / NIP';
    }
}
