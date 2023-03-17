<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'price', 'stock', 'image', 'description'];

    public function category(): HasOne
    {
        return $this->hasOne(ProductCategory::class);
    }
}
