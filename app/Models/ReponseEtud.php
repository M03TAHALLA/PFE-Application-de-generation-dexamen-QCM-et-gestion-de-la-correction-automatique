<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReponseEtud extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Matricule',
        'A',
        'B',
        'C',
        'D',
        'E',
    ];
    protected $guarded=[];
}
