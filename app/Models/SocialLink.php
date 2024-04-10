<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $social_type_id
 * @property string $link
 * @property int $shop_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Shop $shop
 * @property-read \App\Models\SocialType $socialType
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereSocialTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialLink whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SocialLink extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function socialType(): BelongsTo
    {
        return $this->belongsTo(SocialType::class);
    }
}
