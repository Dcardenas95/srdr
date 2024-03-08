<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cedula',
        'lastname',
        'email',
        'address',
        'phone',
        'type_blood',
        'date_contract',
    ];

    protected $casts = [
        'date_contract' => 'date',
    ];

}
