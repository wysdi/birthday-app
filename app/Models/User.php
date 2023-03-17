<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = [
        'id', 'first_name', 'last_name', 'birthday', 'location',
    ];

}
