@extends('layouts.master')

@section('contenu')
 <body class="mt-4, mb-4">
      <div class="mt-4">
        @if (session()->has("success"))
        <div class="alert alert-success">
        <h3> {{session()->get("success")}}</h3>
        </div>
          
        @endif
    @if ($errors->any())
        <div class="alert alert-danger">   
        
      <ul>
        @foreach ($errors->all() as $error )
        <li>{{$error}}</li>
        @endforeach
  
     
      </ul>
    </div>
    @endif

          <form style="width: 80%, center, left:15%;" class="table table-bordered table-hover mt-3;" method="POST" action="{{route('add')}}">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Intitulé du projet:</label>
                <input type="text" class="form-control" name="intitule" >
        
                  <label for="exampleInputEmail1" class="form-label">Description du projet:</label>
                  <input type="text" class="form-control" name="description">

                  <label for="exampleInputEmail1" class="form-label">Auteur:</label>
                  <input type="text" class="form-control" name="executant">
                
                
                    <label for="exampleInputEmail1" class="form-label">Date de lancement:</label>
                    <input type="date" class="form-control" name="created_at">
                
                    <label for="exampleInputEmail1" class="form-label">Date de mise a jour:</label>
                    <input type="date" class="form-control" name="updated_at">
                  
                    <label for="exampleInputEmail1" class="form-label">statut:</label>
                        <select  class="form-control" name="statut" >
                            <option value=""> </option>
                            @foreach ($statut as $statut)
                            @if ($statut->nom == $statut->statut_nom)
                            <option value="{{$statut->nom}}" selected>{{$statut->nom}}</option> 
                            @else
                            <option value="{{$statut->nom}}">{{$statut->nom}}</option>
                            @endif     
                            @endforeach
                        </select>
                     
                  
              <button type="submit" class="btn btn-primary  mt-1">Enregistrer</button>
              <a href="{{route('voir')}}" class="btn btn-danger , mb-4, mt-1">Annuler</a>
            </form>
  
      </div>
  </div>
  </body>

@endsection