<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'user_permission';

    protected $fillable = [
        'permission_id', 'user_id', 'licensed'
    ];

    /**
     * Get the permission for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

   /**
     * Get the permission for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function permission()
    {
        return $this->belongsTo('App\Models\Permission', 'permission_id', 'id');
    }
}
