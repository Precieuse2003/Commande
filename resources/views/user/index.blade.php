@extends('partials.navbar')
@section('content')
<div class="card mt-5">
<div class="d-flex justify-content-end m-5">
<a href="{{ route('user.create') }}" class="btn btn-primary">
  Ajouter Utilisateur
</a>

</div>
@if(session('succes'))

  <div class="alert alert-danger">{{session('succes')}}</div>

@endif

<div style="overflow-x: auto;">
    <table class="table table-bordered table-hover table-striped m-3">
        <thead>
            <tr>
              <td>Nom</td>
              <td>Rôle</td>
              <td>Email</td>
              <td>Téléphone</td>
              <td>Adresse</td>
              <td>Mot de Passe</td>
              <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
              <th>{{ $user->nom }}</th>
              <th>{{$user->role ? $user->role->name : "RAS"}}</th>
              <th>{{ $user->email }}</th>
              <th>{{ $user->telephone }}</th>
              <th>{{ $user->adresse }}</th>
              <th>{{ $user->password }}</th>
              <th style="width: 320px;">
                <a href="{{ route('user.edit',['user' => $user->id]) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-success">Voir</a>
              </th>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>

</div>
@endsection
