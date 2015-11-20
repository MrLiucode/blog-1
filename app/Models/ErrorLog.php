<?php

namespace App\Models;

class ErrorLog extends BaseModel
{

    protected $with = ['user'];

    protected $table = 'error_logs';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
