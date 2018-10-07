<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    protected $table = 'schedules';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cinema_film_id','room_id', 'start_time', 'end_time'
    ];

    /**
     * Get ticket of schedule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongTo
     */
    public function cinema_film()
    {
        return $this->belongsTo('App\Models\CinemaFilm', 'cinema_film_id', 'id');
    }

    /**
     * Get ticket of schedule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongTo
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id', 'id');
    }

    /**
     * Get ticket of schedule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'schedule_id', 'id');
    }
}
