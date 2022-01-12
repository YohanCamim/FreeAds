<!-- index.blade.php -->

@extends('layoutCat')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <table class="table-auto">

    <h1>Liste des categories</h1>

    <thead>
        <tr class="bg-gray-100">
          <td class="border px-4 py-2">ID</td>
          <td class="border px-4 py-2">Nom</td>
          {{-- <td>Categorie_ID</td> --}}

          <td colspan="2">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
        <tr>
            <td class="border px-4 py-2">{{$category->id}}</td>
            <td class="border px-4 py-2">{{$category->name}}</td>
            {{-- <td>{{$category->category_id}}</td> --}}
            <td><a href="{{ route('category.edit', $category->id)}}" class="bg-green-400">Modifier</a></td>
            <td>
                <form action="{{ route('category.destroy', $category->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection