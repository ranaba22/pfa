<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'image', 'email', 'num_tel', 'adresse','id_departement'];
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}
