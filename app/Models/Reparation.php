<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;

    protected $fillable = [
         
        'Numero_reparation','Date_reparation','Type_reparation','Prix_reparation','vehicule_id'

       ];

   
       public function vehicule(){

        return $this->belongsTo(Vehicule::class);

       }

}
