<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'name', 'role_id', 'action_id'
    ];

    /**
     * Get the permission for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    /**
     * Get the permission for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function action()
    {
        return $this->belongsTo('App\Models\Action', 'action_id', 'id');
    }
}
