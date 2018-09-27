<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionDetail extends Model
{
    protected $table = 'permission_detail';

    protected $fillable = [
        'permission_id', 'action_name', 'action_code', 'check_action'
    ];

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
