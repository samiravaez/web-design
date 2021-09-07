<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Token extends Model
{
    use HasFactory;
    const EXPIRATION_TIME = 2; // minutes

    protected $fillable = [
        'code',
        'user_id',
        'used'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function __construct(array $attributes = [])
    {
        if (!isset($attributes['code'])) {
            $attributes['code'] = $this->generateCode();
        }

        parent::__construct($attributes);
    }

    /**
     * Generate a six digits code
     *
     * @param int $codeLength
     * @return string
     */
    public function generateCode($codeLength = 4)
    {
        $min = pow(10, $codeLength - 1);
        $max = ($min * 10) - 1;
        $code = mt_rand($min, $max);

        return $code;
    }


    public function isValid()
    {
        return !$this->isUsed() && !$this->isExpired();
    }

    /**
     * Is the current token used
     *
     * @return bool
     */
    public function isUsed()
    {
        return $this->used;
    }

    /**
     * Is the current token expired
     *
     * @return bool
     */
    public function isExpired()
    {
        return $this->created_at->diffInMinutes(Carbon::now()) > static::EXPIRATION_TIME;
    }

    public function sendCode()
    {
        if (!$this->user) {
            throw new \Exception("برای این کاربر توکنی موجود نیست.");
        }

        if (!$this->code) {
            $this->code = $this->generateCode();
        }

        try {
            //uncomment this part to send generated code to user mobile_number via mellipayamak

//            sms()->send($this->code, function($sms) {
//                $sms->to([$this->user->mobile_number]); # The numbers to send to.
//            });


        } catch (\Exception $ex) {
            return false; //unable to send SMS
        }

        return true;
    }
}
