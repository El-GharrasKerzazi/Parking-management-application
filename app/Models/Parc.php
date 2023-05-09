<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parc extends Model
{
    use HasFactory;

    protected $fillable = [
         
        'Numero_parc','Nom_parc'

       ];

       public function vehicule(){

          return $this->hasMany(Vehicule::class);
       }

    
  }
