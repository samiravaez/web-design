<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Jalalian;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'mobile_number', 'website_type_id',
        'familiarity_type_id', 'password', 'is_admin'];

    protected $dates = ['created_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function familiarity_type()
    {
        return $this->belongsTo(Familiarity_type::class, 'familiarity_type_id');
    }

    public function website_type()
    {
        return $this->belongsTo(Website_type::class, 'website_type_id');
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class)->withTimestamps();
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getCreatedAtFaAttribute()
    {
        return $this->created_at ?
            Jalalian::fromCarbon($this->created_at)->format('Y/m/d') : null;
    }
}

