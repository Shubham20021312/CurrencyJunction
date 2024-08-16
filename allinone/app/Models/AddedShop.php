<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddedShop extends Model
{
    use HasFactory;
    protected $table = "added_shops";
    protected $fillable = [
        'name', 'location', 'contact', 'operating_hours', 'country', 'additional_services', 'special_instructions',
    ];

}
