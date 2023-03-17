<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'price', 'stock', 'image', 'description', 'product_category_id'];
    protected $with = ['product_category'];

    public function product_category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
