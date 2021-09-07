<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['name', 'cat_id', 'description', 'image', 'price', 'discount_type',
        'discount_value', 'preview_link'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class)->withTimestamps();
    }
}
