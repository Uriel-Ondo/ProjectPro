<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\statut;
use App\Models\tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index2(){
        //pour recuperer la liste des etudiants par ordre alphabetique 
        $tache = tache::orderBy("intitule","asc")->paginate(5);
        $statut = statut::all();
        return view("tache", compact("tache","statut"));
    }

    public function create2(){
        $tache = tache::all();
        $statut = statut::all();
        return view("add", compact("tache","statut"));
    }

    public function store2(Request $request){
        $request->validate([
            "intitule"=>"required",
            "description"=>"required",
            "statut"=>"required",
            "executant"=>"required",
            "created_at"=>"required",
            "updated_at"=>"required"

        ]);
        tache::create([
            "intitule"=>$request->intitule,
            "description"=>$request->description,
            "statut"=>$request->statut,
            "executant"=>$request->executant,
            "created_at"=>$request->created_at,
            "updated_at"=>$request->updated_at
            
    
        ]);
        return back()->with("success","Tâche ajoutée avec succès !!");
    }

    public function update2(Request $request , tache $tache){
        $request->validate([
            "intitule"=>"required",
            "description"=>"required",
            "statut"=>"required",
            "executant"=>"required",
            "created_at"=>"required",
            "updated_at"=>"required"
        ]);
        $tache->update([
            "intitule"=>$request->intitule,
            "description"=>$request->description,
            "statut"=>$request->statut,
            "executant"=>$request->executant,
            "created_at"=>$request->created_at,
            "updated_at"=>$request->updated_at
            
        ]);
        return back()->with("successEdit","La tâche a été mise à jour avec succès !!");
    }
    public function edit2(tache $tache){
        $statut = statut::all();
        return view("edit", compact("tache","statut"));
    }

    public function delete2(tache $tache){
        $nom=$tache->intitule;
        $tache->delete();
        return  back()->with("succesDelete","La tâche $nom a été supprimé avec succès !");
      }
}
