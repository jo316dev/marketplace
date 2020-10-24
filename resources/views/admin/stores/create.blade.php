
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
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="">Descrição</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="">Whatsapp</label>
                        <input type="text" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror" id="" value="{{ old('mobile_phone') }}">
                        @error('mobile_phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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