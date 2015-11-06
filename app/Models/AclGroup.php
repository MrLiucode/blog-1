<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AclGroup extends Model
{
    protected $table = "acl_groups";

    protected $fillable = array(
        'name', 'description'
    );

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'acl_user_groups');
    }

    public function permissions()
    {
        return $this->belongsToMany(AclPermission::class, 'acl_group_permissions', 'group_id', 'permission_id');
    }
}
