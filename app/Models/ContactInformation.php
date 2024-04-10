<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $city
 * @property string $street
 * @property string $home
 * @property string $flat
 * @property string $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereFlat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereUserId($value)
 * @mixin \Eloquent
 */
class ContactInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
