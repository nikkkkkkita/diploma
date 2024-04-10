<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SocialType extends Model
{
    use HasFactory;

    protected $guarded = [];
}
