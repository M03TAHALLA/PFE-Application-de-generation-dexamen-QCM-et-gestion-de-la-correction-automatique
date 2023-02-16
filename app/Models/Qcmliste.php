<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qcmliste extends Model
{
    use HasFactory;

    public function Listesolution(){
        return $this->hasMany(Listesolution::class);
    }
}
