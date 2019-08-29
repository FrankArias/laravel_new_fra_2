@section('content')

@extends('inc.app')

<h1 class="text-center" style="color:white;">LIBROS </h1>

<div class="container">
    
<a class="btn btn-success mb-3" href="{{ route('books.create') }}">Agregar Libros</a>

        <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Reseña</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                  <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->descripcion }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        
              {{ $books->links() }}

</div>

@endsection 
