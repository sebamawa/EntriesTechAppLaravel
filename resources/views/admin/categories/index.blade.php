@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <strong>Lista de Categorías</strong>
                <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">
                    Crear
                </a>
            </div>
            <div class="card-body">    
                <div class="row">        
                @foreach($categories as $category)
                    <div class="col-4">
                        <div class="card m-1">
                            <div class="card-header">
                                <strong><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></strong>
                            </div>
                            <div class="card-body">
                                {{ $category->image_path }}
                                <img src="asset('images_upload/'. $category->image_path)" class="img-responsive">
                            </div>
                        </div>    
                    </div>
                @endforeach
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