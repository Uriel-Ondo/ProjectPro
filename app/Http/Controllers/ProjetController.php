<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\statut;


class ProjetController extends Controller
{
    public function index(){
        //pour recuperer la liste des etudiants par ordre alphabetique 
        $projet = Projet::orderBy("nom","asc")->paginate(5);
        $statut = statut::all();
        return view("welcome", compact("projet","statut"));
    }

    public function create(){
        $projet=Projet::all();
        $statut = statut::all();
        return view("create", compact("projet","statut"));
    }

    public function store(Request $request){
        $request->validate([
            "nom"=>"required",
            "description"=>"required",
            "auteur"=>"required",
            "statut"=>"required",
            "created_at"=>"required",
            "updated_at"=>"required"

        ]);
        Projet::create([
            "nom"=>$request->nom,
            "description"=>$request->description,
            "auteur"=>$request->auteur,
            "statut"=>$request->statut,
            "created_at"=>$request->created_at,
            "updated_at"=>$request->updated_at
            
    
        ]);
        return back()->with("success","projet ajouté avec succès !!");
    }
    public function delete(Projet $projet){
        $nom=$projet->nom;
        $projet->delete();
        return  back()->with("succesDelete","Le projet $nom a été supprimé avec succès !");
      }

      public function update(Request $request , Projet $projet){
        $request->validate([
            "nom"=>"required",
            "description"=>"required",
            "auteur"=>"required",
            "statut"=>"required",
            "created_at"=>"required",
            "updated_at"=>"required"
        ]);
        $projet->update([
            "nom"=>$request->nom,
            "description"=>$request->description,
            "auteur"=>$request->auteur,
            "statut"=>$request->statut,
            "created_at"=>$request->created_at,
            "updated_at"=>$request->updated_at
            
        ]);
        return back()->with("successEdit","Le projet a été mise à jour avec succès !!");
    }
    public function edite(Projet $projet){
        $statut = statut::all();
        return view("update", compact("projet","statut"));
    }
}
