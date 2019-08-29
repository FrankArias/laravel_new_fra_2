@section('content')

@extends('inc.app')

<h1 class="text-center" style="color:white;">LIBROS</h1>


<div class="container">

	<a class="btn btn-success mb-3" href="{{ route('books.create') }}">Agregar libros</a>

	 @if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

	<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Título</th>
      <th scope="col">Reseña</th>
      <th scope="col">Acciones</th>
    
    
    </tr>
  </thead>
  <tbody>
  	@foreach($books as $book)
    <tr>
      <th scope="row">{{ $book->id}}</th>
      <td>{{ $book->title}}</td>
      <td>{{ $book->descripcion}}</td>
      <td><a class="btn btn-info" href="{{ route('books.edit', $book->id) }}">Editar</a>
    </tr>

  @endforeach
   
  </tbody>
</table>

{{ $books->links() }}


</div>



@endsection