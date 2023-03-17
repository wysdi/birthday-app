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

    protected $appends = ['full_name'];

    // The function name will need to start with `get`and ends with `Attribute`
// with the attribute field in-between in camel case.
    public function getFullNameAttribute() // notice that the attribute name is in CamelCase.
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
