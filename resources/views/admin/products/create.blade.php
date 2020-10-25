
@extends('layouts.app')

    @section('content')

        <div class="card">

            <div class="card-header">
                <h2 class="text-center">Criar Produto</h2>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Titulo Produto</label>
                        <input type="text" name="name" class="form-control" id="">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Descrição</label>
                        <input type="text" name="description" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Observações</label>
                        <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Preço</label>
                        <input type="text" name="price" class="form-control" placeholder="R$ 0.00">
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