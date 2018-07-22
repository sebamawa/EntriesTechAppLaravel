@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-7"><strong>{{ $category->name }}</strong></div>
                            <div class="col-md-2">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-default">Editar</a>
                            </div>
                            <div class="col-md-3">
                                {{-- Se usa un form para eliminar para no hacerlo por url (seguridad) --}}
                                {!! Form::open(['id'=>'form_delete_category', 'route'=>['categories.destroy', $category->id], 'method'=>'DELETE']) !!}
                                    <button class="btn btn-danger">Eliminar</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $category->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            //muestra alert de confirmacion para eliminar categoria
            $(document).ready(function(){
                $("#form_delete_category").submit(function(e) {
                    ok = confirm("Está seguro que desea eliminar la categoría?");
                    return ok;
                });
            });
        </script>
    @endsection
@endsection