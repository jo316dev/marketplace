
@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">
            <h2 class="text-center">Criar Categorias</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Titulo da Categoria</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Breve Descrição</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="" value="{{ old('description') }}">
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
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