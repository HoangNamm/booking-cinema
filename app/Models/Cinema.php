<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cinema extends Model
{
    use SoftDeletes;
    protected $table = 'cinemas';

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
        'name', 'address', 'tel', 'description'
    ];


     /**
     * Get many category film detail of film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function films()
    {
        return $this->belongsToMany('App\Models\Film', 'cinema_film', 'cinema_id', 'film_id')->withTimestamps();
    }

    /**
     * Get list Schedule of Cinema
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany('App\Models\Room', 'cinema_id', 'id');
    }
}
