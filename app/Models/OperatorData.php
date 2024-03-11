<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OperatorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'operator_id',
        'fruit_type',
        'fruit_weight',
        'hours_worked',
        'observation',
        'date_collection',
    ];
  

    protected $casts = [
        'date_collection' => 'date',
    ];

    public function operator():BelongsTo
    {
        return $this->belongsTo(Operator::class);
    }
}
