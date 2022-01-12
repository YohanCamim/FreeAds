

@extends('layoutCat')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    <h1>Modifier la catégorie</h1>
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

      <form method="post" action="{{ route('category.update', $category->id ) }}">
        <div class="form-group">
          @csrf
          @method('PATCH')
          <label for="name">Nom :</label>
          <input type="text" class="form-control" name="name" value="{{ $category->name }}"/>
        </div>

        {{-- <div class="form-group">
            <label for="category_id">Categorie id :</label>
            <input type="text" class="form-control" name="category_id" value="{{ $category->category_id }}"/>
        </div> --}}
        
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection