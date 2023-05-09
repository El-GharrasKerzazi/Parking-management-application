<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonctionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
         
        'Cin','Nom','Prenom','Sexe','DateNaissance',
        'LieuNaissance','Email',
        'Tel','Adresse','Service',

       ];


       public function mission(){

        return $this->hasMany(Mission::class);

      }

      

       
}
