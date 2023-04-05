<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonctionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
         
        'cin','nom','prenom','age','grade','parc_id'

       ];

       public function parc(){

          return $this->belongsTo(Parc::class);

       }

       public function reparation(){

        return $this->hasMany(Reparation::class);

       } 

       
}
