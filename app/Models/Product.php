<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function sales() : BelongsToMany
    {
        return $this->belongsToMany(Sale::class, 'sales_has_products')->using(SalesHasProducts::class);
    }
}
