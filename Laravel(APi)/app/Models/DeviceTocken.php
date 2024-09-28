<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
class DeviceTocken extends Model
{
    protected $fillable = [
        'device_token',
    ];
    use HasFactory;
}
