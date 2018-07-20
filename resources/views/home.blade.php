@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row"> <!-- Agregado: Items del dashboard (Entradas y Categorias) -->
                        <div class="col-6">
                            <div class="card">
                                <div class="body">
                                    <a href="#"><h3>Entradas</h3></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="body">
                                    <a href="{{ route('categories.index') }}"><h3>Categorías</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--You are logged in!--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
