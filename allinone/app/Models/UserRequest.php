<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;
    protected $table = "user_request";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
