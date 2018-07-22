@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <strong>Lista de Categorías</strong>
                <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">
                    Crear
                </a>
            </div>
            <div class="card-body">
            @if( $categories->count()==0 )
                    <p class="card-text">Aún no hay categorias registradas</p>
            @else
                <div class="row">

                @foreach($categories as $category)
                    <div class="col-auto mb-3">
                        <div class="card" style="width:20rem;">
                            <div class="card-header">
                                <a href="{{ route('categories.show', $category->id) }}"><strong>{{ $category->name }}</strong></a>
                                <!-- Si la categoria no tiene imagen asociada (path), carga una por defecto -->
                                <object class="rounded float-right" data="storage/{{ $category->image_path }}" type="image/png" width="50px" height="50px">
                                    <img class="rounded float-right" src="images/default-category-question.png" width="50px" height="50px" alt="image">
                                </object>

                            </div>
                            <!--<img class="card-img-top" src="storage/{{ $category->image_path }}" width="100" alt="image">-->
                            <div class="card-body">

                                {{--{{ $category->image_path }}--}}
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
    </div>
</div>        
<!--             <div class="card">
                <div class="card-header">
                    <strong>Lista de categorías</strong>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">
                        Crear
                    </a>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th colspan="4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div> -->
        <!--</div>-->
@endsection