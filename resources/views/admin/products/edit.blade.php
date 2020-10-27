
@extends('layouts.app')

@section('content')

    <div class="card">
        @include('messages.flash-messages')

        <div class="card-header">
            <h2 class="text-center">Editar produto {{ $product->name }}</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
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

                <div class="form-group">
                    <label for="">Imagens do produtos</label>
                    <input type="file" name="photos[]" class="form-control" multiple>
                </div>

                <div class="form-group">
                    <label for="">Categorias</label>
                    <select name="categories[]" id="" class="form-control" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if ($product->categories->contains($category)) selected @endif
                                >{{ $category->name }}</option>
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

    <div class="rown">
        @foreach ($product->photos as $photo)
            <div class="col-4">
                <img src="{{ asset('storage/' . $photo->image) }}" alt="" class="img-fluid">
            </div>
            <form action="{{ route('admin.photo.remove', $photo->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Remover</button>
            </form>
        @endforeach
    </div>




    </div>



    
@endsection