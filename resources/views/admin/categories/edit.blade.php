
@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">
            <h2 class="text-center">Editar: {{ $category->name }}</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')   
                <div class="form-group">
                    <label for="">Titulo da Categoria</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" value="{{ $category->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Breve Descrição</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="" value="{{ $category->description }}">
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
            
        </div>

        <div class="card-footer">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
        </div>

    </form>

    </div>

    
@endsection