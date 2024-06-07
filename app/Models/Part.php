<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Part extends Model
{
    use HasFactory;
    use HasUuids;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'serialnumber',
        'car_id',
    ];
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
