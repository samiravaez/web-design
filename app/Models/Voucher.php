<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Jalalian;

class Voucher extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $dates = ['expires_at', 'starts_at'];
    protected $casts = ['invalid_users' => 'array', 'invalid_products' => 'array'];

    protected $fillable = ['name', 'code', 'description', 'times_used', 'max_uses', 'max_uses_user', 'discount_type',
        'discount_value', 'starts_at', 'expires_at', 'invalid_users', 'invalid_products'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function getExpiresAtFaAttribute()
    {
        return $this->expires_at ?
            Jalalian::fromCarbon($this->expires_at)->format('Y/m/d') : null;
    }

    public function getStartsAtFaAttribute()
    {
        return $this->starts_at ?
            Jalalian::fromCarbon($this->starts_at)->format('Y/m/d') : null;
    }
}