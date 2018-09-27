<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'type'
    ];

    /**
     * Get the permission for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function userPermissions()
    {
        return $this->hasMany('App\Models\User', 'permission_id', 'id');
    }

    /**
     * Get the permission for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function permissionDetails()
    {
        return $this->hasMany('App\Models\PermissionDetail', 'permission_id', 'id');
    }
}
