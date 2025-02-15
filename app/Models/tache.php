<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tache extends Model
{
    use HasFactory;
    protected $fillable = ["intitule","description","statut","executant","created_at","updated_at"];

    public function statut(){

        return $this->belongsTo(statut::class);
 
     }
}
