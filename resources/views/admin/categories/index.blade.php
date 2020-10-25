@extends('layouts.app')

    @section('content')

        <div class="card">
            <div class="card-header">
                @include('messages.flash-messages')
                <h1 class="text-center">Categorias Cadastradas</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
         
                         <thead class="thead-dark text-center">
                             <th>#</th>
                             <th>Nome</th>
                             <th>Ações</th>
                         </thead>
                         <tbody>
                             @foreach ($categories as $category)
                                 <tr>
                                     <td>{{ $category->id }}</td>
                                     <td>{{ $category->name }}</td>
                                
                                     <td>
                                        <button class="btn btn-success">Detalhes</button>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                                        
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
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
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Cadastrar Categoria</a>
                </div>
            </div>
        </div>

     
        
    @endsection