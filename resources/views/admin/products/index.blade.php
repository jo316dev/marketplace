@extends('layouts.app')

    @section('content')

        <div class="card">
            <div class="card-header">
                @include('messages.flash-messages')
                <h1 class="text-center">Relação de Produtos</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
         
                         <thead class="thead-dark text-center">
                             <th>#</th>
                             <th>Nome</th>
                             <th>Descrição</th>
                             <th>Preço</th>
                             <th>Ações</th>
                         </thead>
                         <tbody>
                             @foreach ($products as $product)
                                 <tr>
                                     <td>{{ $product->id }}</td>
                                     <td>{{ $product->name }}</td>
                                     <td>{{ $product->description }}</td>
                                     <td>{{ $product->price }}</td>
                                     <td>
                                        <button class="btn btn-success">Detalhes</button>
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                                        
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Deletar</button>
                                        </form>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
         
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-success">Cadastrar Produtos</a>
                </div>
            </div>
        </div>

     
        
    @endsection