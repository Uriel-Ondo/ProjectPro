@extends("layouts.master")


@section("contenu")
<body>
    <div class="mt-4">
    <div class="d-flex justify-content-between mb-4">
    <!--pour pouvoir paginer-->
    
        <a href="{{route('create')}}" class="btn btn-primary"  >Ajouter un nouveau projet</a>
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
              <th scope="col">Intitulé du projet:</th>
              <th scope="col">Auteur:</th>
              <th scope="col">statut:</th>
              <th scope="col">description:</th>
              <th scope="col">date de creation:</th>
              <th scope="col">date modification:</th>
          </tr>
        </thead>
        @foreach ($projet as $projet )
        
        <tbody>
          <tr>
              <th scope="row"> {{$projet->nom}}</th>
              <td> {{$projet->auteur}}</td>
              <td>{{$projet->statut}} </td>
              <td>{{$projet->description}}  </td>
              <td> {{$projet->created_at}}</td>
            <td>{{$projet->updated_at}} </td>
          <td>
            <a href="{{route('editer',['projet'=>$projet->id])}}" class="btn btn-info mb-4" >Editer</a>
             <a href="{{route('voir')}}" class="btn btn-info mb-4" >Gérer le projet</a>
            
            <a href="#" class="btn btn-danger mb-1" onclick="if(confirm('Voulez vous vraiment supprimer ce projet?'))
            {document.getElementById('form={{$projet->id}}').submit()}">Supprimer</a>
      
      <form id="form={{$projet->id}}" action="{{route('delete',['projet'=>$projet->id])}}"
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