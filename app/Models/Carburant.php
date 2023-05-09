<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carburant extends Model
{
    use HasFactory;


    protected $fillable = [
         
        'NemuroCarburant','DateCarburant','Kilometrage','Quantite','Prix','vehicule_id'

       ];

   
       public function vehicule(){

        return $this->belongsTo(Vehicule::class);

       }
}
