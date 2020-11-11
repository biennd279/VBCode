<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Submission
 *
 * @property int $id
 * @property string|null $result
 * @property int $user_id
 * @property int $problem_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereProblemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Submission whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Problem $problem
 * @property-read \App\Models\User $user
 */
class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'result',
        'file',
        'point',
        'user_id',
        'problem_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function problem()
    {
        return $this->belongsTo(Problem::class);
    }
}
