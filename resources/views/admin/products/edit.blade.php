
@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">
            <h2 class="text-center">Editar produto {{ $product->name }}</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('products.update', $product->id)}}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="">Titulo do produto</label>
                    <input type="text" name="name" class="form-control" id="" value="{{ $product->name }}">
                </div>
                
                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text" name="description" class="form-control" value="{{ $product->description }}">
                </div>
                
                <div class="form-group">
                    <label for="">Valor</label>
                    <input type="text" name="phone" class="form-control" value="{{ $product->price }}">
                </div>
                
                <div class="form-group">
                    <label for="">Descrição detalhada</label>
                    <textarea name="body" id="" cols="30" class="form-control" rows="10">{{ $product->body }}</textarea>
                </div>
                
                
        </div>

        <div class="card-footer">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>

    </form>

    </div>

    
@endsection