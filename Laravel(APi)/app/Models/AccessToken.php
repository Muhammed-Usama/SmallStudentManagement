<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use MongoDB\Laravel\Eloquent\Model;
use Laravel\Passport\Token;

class AccessToken extends Model
{
    use HasFactory;

    protected $collection = 'oauth_access_tokens'; // MongoDB collection name
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
