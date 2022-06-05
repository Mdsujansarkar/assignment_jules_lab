<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UrlShorts;

class UserAgentInfo extends Model
{
    use HasFactory;

    public function userInfo()
    {
        return $this->belongsTo(UrlShorts::class,'user_id','user_id');
    }
}
