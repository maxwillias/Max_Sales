<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SalesHasProducts extends Pivot
{
    use HasFactory;

    protected $table = 'sales_has_products';

    protected $fillable = ['sale_id', 'product_id', 'quantity_products'];

    public $timestamps = false;

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
