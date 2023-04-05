<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
         
        'matricule','type','marque','date_assurance','mission','fonctionnaire_id','parc_id'

       ];

       public function parc(){

          return $this->belongsTo(Parc::class);
       }

       public function fonctionnaire(){

        return $this->belongsTo(Fonctionnaire::class);
       }

       public function panne(){

        return $this->hasMany(Panne::class);
       }

       public function reparation(){

        return $this->hasMany(Reparation::class);
       }





}
