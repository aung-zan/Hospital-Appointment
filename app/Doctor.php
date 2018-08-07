<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class Doctor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id', 'name', 'about',
    ];

    /**
     * The function for belongsTo relationship.
     *
     * @var array
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * The function for hasMany relationship.
     *
     * @var array
     */
    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
