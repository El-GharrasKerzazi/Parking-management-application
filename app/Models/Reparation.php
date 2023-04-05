<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;

    protected $fillable = [
         
        'numero_reparation','date_reparation','fonctionnaire_id','vehicule_id'

       ];

       public function fonctionnaire(){
         
        return $this->belongsTo(Fonctionnaire::class);

       }
       
       public function vehicule(){

        return $this->belongsTo(Vehicule::class);

       }

}
