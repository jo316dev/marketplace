@extends('layouts.app')

    @section('content')

        <div class="card">
            <div class="card-header">
                @include('messages.flash-messages')
                <h1 class="text-center">Relação de Lojas Cadastradas</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
         
                         <thead class="thead-dark">
                             <th>#</th>
                             <th>Loja</th>
                             <th>Ações</th>
                         </thead>
                         <tbody>
                             @foreach ($stores as $store)
                                 <tr>
                                     <td>{{ $store->id }}</td>
                                     <td>{{ $store->name }}</td>
                                     <td>
                                        <button class="btn btn-success">Detalhes</button>
                                        <a href="{{ route('admin.stores.edit', $store->id) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('admin.stores.destroy', $store->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                       
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
         
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.stores.create') }}" class="btn btn-success">Cadastrar Loja</a>
                </div>
            </div>
        </div>

     
        
    @endsection