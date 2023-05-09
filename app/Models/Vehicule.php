<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
         
        'Matricule','Type','Marque','Kilometrage','TypeCarb',
        'DateDebutAssurance','CoutCarburant','CoutAssurance','CoutReparation','parc_id'

       ];

       public function parc(){

          return $this->belongsTo(Parc::class);
       }

       public function mission(){

        return $this->hasMany(Mission::class);
       }

       public function panne(){

        return $this->hasMany(Panne::class);
       }

       public function reparation(){

        return $this->hasMany(Reparation::class);
       }

       public function carburant(){

        return $this->hasMany(Carburant::class);
       }

      






}
