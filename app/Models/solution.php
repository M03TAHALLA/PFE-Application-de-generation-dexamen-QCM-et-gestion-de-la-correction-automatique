<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solution extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'qcmliste_id',
        'A',
        'B',
        'C',
        'D',
        'E',
    ];
}
