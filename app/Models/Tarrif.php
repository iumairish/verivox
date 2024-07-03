<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarrif extends Model
{
    use HasFactory;

    protected $table = 'tarrif';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'baseCost',
        'includedKwh',
        'additionalKwhCost',
    ];
}
