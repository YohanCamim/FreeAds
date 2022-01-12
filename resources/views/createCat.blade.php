@extends('layoutCat')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    <h1>Déposer une categorie</h1>
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('category.store') }}">
.         @csrf
            <div class="form-group">
                <label for="name">Nom de la categorie :</label>
                <input type="text" class="form-control" name="name"/>
            </div>

            {{-- <div class="form-group">
            <label for="category_id">Identifiant ID category :</label>
            <input type="text" class="form-control" name="category_id"/>
            </div> --}}

            <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection

