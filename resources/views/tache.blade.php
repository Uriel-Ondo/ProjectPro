@extends('layouts.master')

@section('contenu')

<body>
    <div class="mt-4">
    <div class="d-flex justify-content-between mb-4">
    <!--pour pouvoir paginer-->
    
        <a href="{{route('new')}}" class="btn btn-primary"  >Ajouter une tache</a>
    </div>

@if (session()->has("succesDelete"))
<div class="alert alert-success">
<h3> {{session()->get("succesDelete")}}</h3>
</div>
  
@endif
  <footer class="mt-auto text-white-50">
    <table style="width: 80%, center, left:15%;" class="table table-bordered table-hover mt-3">
        <thead>
          <tr>
              <th scope="col">Intitulé de la tache:</th>
              <th scope="col">Auteur:</th>
              <th scope="col">statut:</th>
              <th scope="col">description:</th>
              <th scope="col">date de creation:</th>
              <th scope="col">date modification:</th>
          </tr>
        </thead>
        @foreach ($tache as $tache )
        
        <tbody>
          <tr>
              <th scope="row"> {{$tache->intitule}}</th>
              <td> {{$tache->executant}}</td>
              <td>{{$tache->statut}} </td>
              <td>{{$tache->description}}  </td>
              <td> {{$tache->created_at}}</td>
            <td>{{$tache->updated_at}} </td>
          <td>
            <a href="{{route('edit',['tache'=>$tache->id])}}" class="btn btn-info mb-2 mt-1" >Editer</a>
    
            
            <a href="#" class="btn btn-danger mb-1" onclick="if(confirm('Voulez vous vraiment supprimer ce projet?'))
            {document.getElementById('form={{$tache->id}}').submit()}">Supprimer</a>
      
            <form id="form={{$tache->id}}" action="{{route('deleted',['tache'=>$tache->id])}}"
              method="POST">
             @csrf
            <input type="hidden" name="_method" value="delete">
            </form>
            
        </td>
          </tr>
      </tbody>
      @endforeach
    
      </table>
  </footer>
</div>
</body>

@endsection