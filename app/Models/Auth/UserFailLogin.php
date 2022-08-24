<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserFailLogin extends Model
{
    public $timestamps = false;
    protected $table  = "user_fail_login";

    protected $fillable = [
        'no_absen',
        'ip_address',
        'created_at'
    ];

}
