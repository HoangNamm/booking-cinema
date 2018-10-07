<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    /**
     * Get the permission for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id', 'id');
    }

    /**
     * Get the permission for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function permission()
    {
        return $this->hasMany('App\Models\Permission', 'role_id', 'id');
    }
}
