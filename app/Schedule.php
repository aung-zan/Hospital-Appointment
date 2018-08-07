<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id', 'name', 'appointment_time', 'phone_number', 'email', 'status'
    ];

    // *
    //  * The attributes that are use for coustom accessor.
    //  *
    //  * @var array

    // protected $appends = [
    //     'pending', 'confirm', 'complete',
    // ];

    /**
     * The function for belongsTo relationship.
     *
     * @var array
     */
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    // /**
    //  * Get pending status.
    //  *
    //  * @return boolean
    //  */
    // public function getPendingAttribute()
    // {
    //     return $this->where('status', 0)->count();
    // }

    // /**
    //  * Get confirm status.
    //  *
    //  * @return boolean
    //  */
    // public function getConfirmAttribute()
    // {
    //     return $this->where('status', 1)->count();
    // }

    // /**
    //  * Get complete status.
    //  *
    //  * @return boolean
    //  */
    // public function getCompleteAttribute()
    // {
    //     return $this->where('status', 2)->count();
    // }
}
