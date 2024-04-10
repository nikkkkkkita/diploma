<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $country_of_manufacture
 * @property string|null $compound
 * @property string|null $material
 * @property float|null $height
 * @property float|null $volume
 * @property string|null $aroma
 * @property float|null $burning_time
 * @property string|null $wick_type
 * @property string|null $type
 * @property float|null $weight
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $type_diffuser
 * @property string|null $type_of_flavoring
 * @property string|null $diffuser_placement
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereAroma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereBurningTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereCompound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereCountryOfManufacture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereDiffuserPlacement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereTypeDiffuser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereTypeOfFlavoring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristic whereWickType($value)
 * @mixin \Eloquent
 */
class Characteristic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
