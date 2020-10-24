@extends('layouts.app')

    @section('content')

        <div class="card">
            <div class="card-header">
                @include('messages.flash-messages')
                <h1 class="text-center">Relação de Lojas Cadastradas</h1>
            </div>
            <div class="card-body">
                    <div class="jumbotron">
                        <h1 class="display-4">{{ $store->name }}</h1>
                        <p class="lead">{{ $store->description }}</p>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Ver produtos</a>
                    </div>
                </div>
                <div class="card-footer">
                   @if (!$store)
                       Você ainda não criou sua loja! <a href="{{ route('admin.stores.create') }}" class="btn btn-success">CriarLoja</a>
                   @else
                    <a href="{{ route('admin.products.create') }}" class="btn btn-dark">Cadastrar Produtos produtos</a>
                   @endif
                </div>
            </div>
        </div>

     
        
    @endsection