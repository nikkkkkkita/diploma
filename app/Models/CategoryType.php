<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
