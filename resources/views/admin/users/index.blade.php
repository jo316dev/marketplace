@extends('layouts.app')

    @section('content')

        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Usuários Cadastrados</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
         
                         <thead class="thead-dark">
                             <th>#</th>
                             <th>Nome</th>
                             <th>Email</th>
                         </thead>
                         <tbody>
                             @foreach ($users as $user)
                                 <tr>
                                     <td>{{ $user->name }}</td>
                                     <td>{{ $user->email }}</td>
                                     <td>
                                        <button class="btn btn-success">Detalhes</button>
                                         <button class="btn btn-warning">Editar</button>
                                         <button class="btn btn-danger">Excluir</button>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
         
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('users.create') }}" class="btn btn-success">Criar Usuário</a>
                    <a href="{{ route('stores.index') }}" class="btn btn-primary">Lojas</a>
                </div>
            </div>
        </div>

     
        
    @endsection