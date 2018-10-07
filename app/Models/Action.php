<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';

    protected $fillable = [
        'action'
    ];

    /**
     * Get the permission for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function permissions()
    {
        return $this->hasMany('App\Models\Permission', 'action_id', 'id');
    }
}
