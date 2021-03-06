<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cinema_id', 'name', 'status'
    ];

    /**
     * Get seats detail of room.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule', 'room_id', 'id');
    }

    /**
     * Get seats detail of room.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function seats()
    {
        return $this->hasMany('App\Models\Seat', 'room_id', 'id');
    }

     /**
     * Get schedule of room.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function cinemas()
    {
        return $this->belongsTo()('App\Models\Cinema', 'cinema_id', 'id');
    }
}
