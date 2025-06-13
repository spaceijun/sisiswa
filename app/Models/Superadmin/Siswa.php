<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Siswa
 *
 * @property $id
 * @property $kelas_id
 * @property $nama_siswa
 * @property $nis
 * @property $tempat_lahir
 * @property $tanggal_lahir
 * @property $alamat
 * @property $agama
 * @property $jenis_kelamin
 * @property $telephone
 * @property $image
 * @property $nama_ayah
 * @property $nama_ibu
 * @property $tahun_ajaran
 * @property $penilaian
 * @property $created_at
 * @property $updated_at
 *
 * @property Kela $kela
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Siswa extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['kelas_id', 'user_id', 'nama_siswa', 'nis', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'agama', 'jenis_kelamin', 'telephone', 'image', 'nama_ayah', 'nama_ibu', 'tahun_ajaran', 'penilaian', 'orangtua_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kela()
    {
        return $this->belongsTo(\App\Models\Superadmin\Kela::class, 'kelas_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
