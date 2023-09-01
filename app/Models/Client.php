<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'company_name',
        'mobile_no',
        'address',
    ];

    protected $hidden = [
        'password',
    ];
}
