<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UrlShorts;

class UserAgentInfo extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address','location','latitude','longitude','browser','os_name','device'];
    public function userInfo()
    {
        return $this->belongsTo(UrlShorts::class,'user_id','user_id');
    }

    public function scopeFilterByDateRangeFor($query, $request)
    {
        $start_date = date('Y-m-d', strtotime($request->start_date));
        $end_date = date('Y-m-d', strtotime($request->end_date));

        if ($request->filled('start_date') || $request->filled('end_date')) { 
            return $query->whereBetween('created_at', [$start_date, $end_date]);
                      
        }
    }

}
