
@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">
            <h2 class="text-center">Editar Loja: {{ $store->name }}</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.stores.update', $store->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nome da Loja</label>
                    <input type="text" name="name" class="form-control" id="" value="{{ $store->name }}">
                </div>
                
                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text" name="description" class="form-control" value="{{ $store->description }}">
                </div>
                
                <div class="form-group">
                    <label for="">Telefone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $store->phone }}">
                </div>
                
                <div class="form-group">
                    <label for="">Whatsapp</label>
                    <input type="text" name="mobile_phone" class="form-control" value="{{ $store->mobile_phone }}">
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