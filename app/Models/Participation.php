<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Participation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Participation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Participation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contest_id'
    ];
}
