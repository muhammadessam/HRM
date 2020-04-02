<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vacation
 *
 * @package App
 * @property string $name
 * @property integer $days
 * @property string $repetition
 * @property string $accumulated
 * @property string $salary_affected
 * @property string $can_be_exceeded
*/
class Vacation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'days',
        'repetition',
        'accumulated',
        'salary_affected',
        'can_be_exceeded',
    ];
    protected $hidden = [];

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setDaysAttribute($input)
    {
        $this->attributes['days'] = $input ? $input : null;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'deserved_vacations');
    }
    
}
