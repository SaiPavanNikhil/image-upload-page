<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    use HasFactory;

    protected $table= 'signup';

    protected $fillable = [
        'first_name',
        'last_name',
        'Username',
        'email',
        'password',
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
