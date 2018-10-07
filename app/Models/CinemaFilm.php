<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CinemaFilm extends Model
{
    protected $table = 'cinema_film';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cinema_id', 'film_id'
    ];

    /**
     * Get category film detail of category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function cinema()
    {
        return $this->belongsTo('App\Models\Cinema', 'cinema_id', 'id');
    }

    /**
     * Get film detail of category film.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function film()
    {
        return $this->belongsTo('App\Models\Film', 'film_id', 'id');
    }
}
