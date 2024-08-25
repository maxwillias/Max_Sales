<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'photo',
        'category',
        'price',
        'quantity',
    ];

    public function sales(): BelongsToMany
    {
        return $this->belongsToMany(Sale::class, 'sales_has_products')->using(SalesHasProducts::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category', 'code');
    }
}
