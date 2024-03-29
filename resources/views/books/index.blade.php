@section('content')

@extends('inc.app')

<h1 class="text-center" style="color:white;">LIBROS</h1>


<div class="container">

  @guest

  @if (Route::has('register'))

  @endif
  @else
  <a class="btn btn-success mb-3" href="{{ route('books.create') }}">Agregar libros</a>

  @endguest
  @if (Session::has('message'))
  <div class="alert alert-info">{{ Session::get('message') }}</div>
  @endif

  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Título</th>
        <th scope="col">Reseña</th>
        @auth
        <th scope="col">Acciones</th>
        @endauth

      </tr>
    </thead>
    <tbody>
      @foreach($books as $book)
      <tr>
        <th scope="row">{{ $book->id}}</th>
        <td><a href="{{ route('books.show',$book->id ) }}">{{ $book->title}}</a></td>
        <td>{{ $book->descripcion}}</td>
        @if (Auth::user()->id == $book->user_id )
        <td><a class="btn btn-info" href="{{ route('books.edit', $book->id) }}"><i class="far fa-edit"></i></a>

          <form action="{{ route('books.destroy',$book->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn-sm btn-danger mt-3"
              onclick="return confirm('Quiere borrar el registro?')"><i class="far fa-trash-alt"></i></button>


          </form>

        </td>
        @else
        <td>
          No es tu libro
        </td>
        @endif
        </td>


      </tr>

      @endforeach

    </tbody>
  </table>

  {{ $books->links() }}


</div>



@endsection