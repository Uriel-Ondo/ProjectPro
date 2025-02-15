<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projet extends Model
{
    use HasFactory;
    protected $fillable = ["nom","description","statut","auteur"];

    public function statut(){

        return $this->belongsTo(statut::class);
 
     }
}
