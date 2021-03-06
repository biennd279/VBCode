<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contest
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon $time_start
 * @property \Illuminate\Support\Carbon $time_end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contest whereTimeEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contest whereTimeStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contest whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Participant[] $participants
 * @property-read int|null $participants_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Problem[] $problems
 * @property-read int|null $problems_count
 */
class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'time_start',
        'time_end'
    ];

    protected $casts = [
        'time_start' => 'datetime',
        'time_end' => 'datetime'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'participant')
            ->using(Participant::class);
    }

    public function problems()
    {
        return $this->hasMany(Problem::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
