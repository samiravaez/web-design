<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;


    protected $fillable = ['name','parent_id','description','slug'];
    public function parent()
    {
        return $this->belongsTo(self::class , 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class , 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class,'parent_id')->with('children');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
