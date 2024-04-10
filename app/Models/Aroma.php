<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Aroma newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Aroma newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Aroma query()
 * @method static \Illuminate\Database\Eloquent\Builder|Aroma whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aroma whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aroma whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aroma whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Aroma extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_aromas');
    }
}
