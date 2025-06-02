<?php

namespace App\Models\Superadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $telephone
 * @property $email_verified_at
 * @property $password
 * @property $role
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Budidaya[] $budidayas
 * @property Doc[] $docs
 * @property Kandang[] $kandangs
 * @property Pakan[] $pakans
 * @property Panen[] $panens
 * @property Vaksin[] $vaksins
 * @property AssetTransaction[] $assetTransactions
 * @property AssetTransaction[] $assetTransactions
 * @property Asset[] $assets
 * @property Booking[] $bookings
 * @property Brand[] $brands
 * @property Business[] $businesses
 * @property CashRegister[] $cashRegisters
 * @property Category[] $categories
 * @property Contact[] $contacts
 * @property Product[] $products
 * @property TaxRate[] $taxRates
 * @property Transaction[] $transactions
 * @property Transaction[] $transactions
 * @property Unit[] $units
 * @property JawabanFrasa[] $jawabanFrasas
 * @property JawabanGrammar[] $jawabanGrammars
 * @property JawabanHafalan[] $jawabanHafalans
 * @property JawabanIdiom[] $jawabanIdioms
 * @property JawabanKosakata[] $jawabanKosakatas
 * @property JawabanTense[] $jawabanTenses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'telephone', 'role'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budidayas()
    {
        return $this->hasMany(\App\Models\Superadmin\Budidaya::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docs()
    {
        return $this->hasMany(\App\Models\Superadmin\Doc::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kandangs()
    {
        return $this->hasMany(\App\Models\Superadmin\Kandang::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pakans()
    {
        return $this->hasMany(\App\Models\Superadmin\Pakan::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function panens()
    {
        return $this->hasMany(\App\Models\Superadmin\Panen::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vaksins()
    {
        return $this->hasMany(\App\Models\Superadmin\Vaksin::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assetTransactions()
    {
        return $this->hasMany(\App\Models\Superadmin\AssetTransaction::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assetTransactions()
    {
        return $this->hasMany(\App\Models\Superadmin\AssetTransaction::class, 'id', 'receiver');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assets()
    {
        return $this->hasMany(\App\Models\Superadmin\Asset::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(\App\Models\Superadmin\Booking::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brands()
    {
        return $this->hasMany(\App\Models\Superadmin\Brand::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function businesses()
    {
        return $this->hasMany(\App\Models\Superadmin\Business::class, 'id', 'owner_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cashRegisters()
    {
        return $this->hasMany(\App\Models\Superadmin\CashRegister::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(\App\Models\Superadmin\Category::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(\App\Models\Superadmin\Contact::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(\App\Models\Superadmin\Product::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taxRates()
    {
        return $this->hasMany(\App\Models\Superadmin\TaxRate::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(\App\Models\Superadmin\Transaction::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(\App\Models\Superadmin\Transaction::class, 'id', 'expense_for');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function units()
    {
        return $this->hasMany(\App\Models\Superadmin\Unit::class, 'id', 'created_by');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawabanFrasas()
    {
        return $this->hasMany(\App\Models\Superadmin\JawabanFrasa::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawabanGrammars()
    {
        return $this->hasMany(\App\Models\Superadmin\JawabanGrammar::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawabanHafalans()
    {
        return $this->hasMany(\App\Models\Superadmin\JawabanHafalan::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawabanIdioms()
    {
        return $this->hasMany(\App\Models\Superadmin\JawabanIdiom::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawabanKosakatas()
    {
        return $this->hasMany(\App\Models\Superadmin\JawabanKosakata::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawabanTenses()
    {
        return $this->hasMany(\App\Models\Superadmin\JawabanTense::class, 'id', 'user_id');
    }
    
}
