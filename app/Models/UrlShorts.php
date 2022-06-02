<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShorts extends Model
{
    use HasFactory;
    protected $fillable = ['main_url','short_url'];
}
