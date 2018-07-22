@extends('layouts.app')

@section('content')
<div class="container">

        <div class="card">
            <div class="card-header">
                <strong>Lista de Categorías</strong>
                <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">
                    Crear
                </a>
            </div>
            <div class="card-body">
            @if( $categories->count()==0 )
                    <p class="card-text">No hay categorias registradas</p>
            @else
                {{--<div class="card-columns">--}}
                <div class="row"> <!-- Se usa row-columns para dehar de igual altura cada fila de cards (h-100) -->
                    @foreach($categories as $category)
                        <div class="col-sm-4 py-2">
                            <div class="card h-100">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-9">
                                            <a href="{{ route('categories.show', $category->id) }}"><strong>{{ $category->name }}</strong></a>
                                        </div>
                                        <div class="col-3">
                                            <!-- Si la categoria no tiene imagen asociada (path), carga una por defecto -->
                                            <object class="img-thumbnail float-right" data="storage/{{ $category->image_path }}" type="image/png">
                                                <img class="img-thumbnail float-right" src="images/default-category-question.png" alt="image">
                                                </object>
                                            </div>
                                        </div>
                                    </div>
                                <!--<img class="card-img-top" src="storage/{{ $category->image_path }}" width="100" alt="image">-->
                                <div class="card-body">
                                    <p class="card-text">{{ $category->body }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            </div>  
        </div>
</div>
@endsection