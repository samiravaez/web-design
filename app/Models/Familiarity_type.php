<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familiarity_type extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
