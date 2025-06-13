<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KelasCategory
 *
 * @property $id
 * @property $nama_kategori
 * @property $created_at
 * @property $updated_at
 *
 * @property Kela[] $kelas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class KelasCategory extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama_kategori'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelas()
    {
        return $this->hasMany(\App\Models\Superadmin\Kela::class, 'id', 'kelas_category_id');
    }
    
}
