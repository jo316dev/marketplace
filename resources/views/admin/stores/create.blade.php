
@extends('layouts.app')

    @section('content')

        <div class="card">

            <div class="card-header">
                <h2 class="text-center">Criar Loja</h2>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.stores.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nome da Loja</label>
                        <input type="text" name="name" class="form-control" id="">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Descrição</label>
                        <input type="text" name="description" class="form-control id="">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" name="phone" class="form-control" id="">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Whatsapp</label>
                        <input type="text" name="mobile_phone" class="form-control" id="">
                    </div>
                    
                    
                    <select name="user" id="" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
               
            </div>

            <div class="card-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>

        </form>

        </div>

        
    @endsection