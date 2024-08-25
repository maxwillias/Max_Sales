<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'code';

    protected $fillable = [
        'name',
        'icon',
        'description',
    ];

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
