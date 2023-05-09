<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
         
        'CodeMission','DateDepart','DateRetour','Lieu','Object',
        'Ville','vehicule_id','fonctionnaire_id'

       ];


       public function vehicule(){

        return $this->belongsTo(Vehicule::class);

        }

        
       public function fonctionnaire(){

        return $this->belongsTo(Fonctionnaire::class);

        }
}
