<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Guru
 *
 * @property $id
 * @property $nip
 * @property $nama_guru
 * @property $kelas_id
 * @property $alamat
 * @property $status
 * @property $telephone
 * @property $jabatan
 * @property $created_at
 * @property $updated_at
 *
 * @property Kela $kela
 * @property Kela[] $kelas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Guru extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nip', 'user_id', 'nama_guru', 'kelas_id', 'alamat', 'status', 'telephone', 'jabatan'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kela()
    {
        return $this->belongsTo(\App\Models\Superadmin\Kela::class, 'kelas_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelas()
    {
        return $this->hasMany(\App\Models\Superadmin\Kela::class, 'id', 'guru_id');
    }
}
