<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cedula',
        'last_name',
        'email',
        'address',
        'phone',
        'type_blood',
        'date_contract',
    ];

    protected $casts = [
        'date_contract' => 'date',
    ];

    

    public function operatorDatas():HasMany
    {
        return $this->hasMany(OperatorData::class);
    }

}
