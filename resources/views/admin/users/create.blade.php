
@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">
            <h2 class="text-center">Criar Usuario</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" name="name" class="form-control" id="">
                </div>
                
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control id="">
                </div>
                
                <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" name="password" class="form-control" id="">
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