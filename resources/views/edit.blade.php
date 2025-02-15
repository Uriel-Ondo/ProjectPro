@extends('layouts.master')

@section('contenu')

<body class="mt-4, mb-4">
    
    <div class="mt-4">
      @if (session()->has("successEdit"))
      <div class="alert alert-success">
      <h3> {{session()->get("successEdit")}}</h3>
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
        <form style="width: 65%;" method="POST"  action="{{route('updated',['tache'=>$tache->id])}}">
          @csrf
            <input type="hidden" name="_method" value="put">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Intitulé de la tache:</label>
              <input type="text" class="form-control" name="intitule" value="{{$tache->intitule}}" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Executant:</label>
                <input type="text" class="form-control" name="executant"value="{{$tache->executant}}" >
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description:</label>
                <input type="text" class="form-control" name="description" value="{{$tache->description}}" >
              </div>
              <div class="mb-3">

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
                    </div>
                </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{route('voir')}}" class="btn btn-danger">Annuler</a>
          </form>

    </div>
</div>
</body>

@endsection