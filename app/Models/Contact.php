<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

// use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $filable = [
        'name',
        'email',
        'status',
        'password',
        
    ];
    
}
