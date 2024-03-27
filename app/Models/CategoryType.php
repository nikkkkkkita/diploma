<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryType extends Model
{
    use HasFactory;

    protected $table = 'category_types';
    protected $guarded = [];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
