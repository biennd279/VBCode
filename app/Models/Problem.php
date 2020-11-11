<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Problem
 *
 * @property int $id
 * @property string $name
 * @property string $question
 * @property int $point
 * @property int $contest_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Problem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Problem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Problem query()
 * @method static \Illuminate\Database\Eloquent\Builder|Problem whereContestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Problem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Problem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Problem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Problem wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Problem whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Problem whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Contest $contest
 * @property string|null $testcase
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Submission[] $submissions
 * @property-read int|null $submissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Problem whereTestcase($value)
 */
class Problem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'question',
        'point',
        'contest_id',
        'testcase',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
