<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parc extends Model
{
    use HasFactory;

    protected $fillable = [
         
        'numero_parc','nom_parc','emplacement'

       ];

       public function fonctionnaire(){

          return $this->hasMany(Fonctionnaire::class);
       }

    //    public function getRouteKeyName(){
            
    //        return "numero_parc";
    //    }
}
