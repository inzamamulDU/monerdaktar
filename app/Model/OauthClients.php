<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OauthClients extends Model
{
    protected $fillable = [
        'id','secret'
    ];
}
