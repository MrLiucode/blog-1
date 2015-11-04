<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AclPermission extends Model
{
    protected $table = 'acl_permissions';

    protected $fillable = array(
        'ident', 'description'
    );

    public $timestamps = false;

    public function groups()
    {
        return $this->belongsToMany(AclGroup::class, 'acl_group_permissions');
    }

    public function getKey()
    {
        return $this->attributes['ident'];
    }
}
