
@extends('layouts.app')

    @section('content')

        <div class="card">

            <div class="card-header">
                <h2 class="text-center">Criar Produto</h2>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Titulo Produto</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" value="{{ old('name') }}" id="">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="">Descrição</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="" value="{{ old('description') }}">
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Observações</label>
                        <textarea name="body" id="" cols="30" rows="10" class="form-control "></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Preço</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="" value="{{ old('price') }}" placeholder="R$ 0.00">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Imagens do produtos</label>
                        <input type="file" name="photos[]" class="form-control" multiple>
                    </div>

                    <div class="form-group">
                        <label for="">Catgorias</label>
                        <select name="categories[]" id="" class="form-control" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
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