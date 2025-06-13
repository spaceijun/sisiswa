<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Kela
 *
 * @property $id
 * @property $nama_kelas
 * @property $kelas_category_id
 * @property $jumlah_siswa
 * @property $guru_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Guru $guru
 * @property KelasCategory $kelasCategory
 * @property Guru[] $guruses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Kela extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas', 'kelas_category_id', 'jumlah_siswa', 'guru_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guru()
    {
        return $this->belongsTo(\App\Models\Superadmin\Guru::class, 'guru_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelasCategory()
    {
        return $this->belongsTo(KelasCategory::class, 'kelas_category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guruses()
    {
        return $this->hasMany(\App\Models\Superadmin\Guru::class, 'id', 'kelas_id');
    }
}
