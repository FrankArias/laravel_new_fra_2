@section('content')

@extends('inc.app')

<h1 class="text-center" style="color:white;">Agregar Libros </h1>

<div class="container">
<form action="{{ route('books.update', $book->id) }}" method="POST">

    @csrf
    @method('PUT')

     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
            <input type="text" name="title" value="{{ $book->title }}" class="form-control" placeholder="Título del Libro">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
            <textarea class="form-control"  name="descripcion" placeholder="Reseña">{{ $book->descripcion }}</textarea>
            </div>
        </div>
        <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
   
</form>
</div>




@endsection
