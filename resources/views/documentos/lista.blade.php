@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

        <h1>Listagem de documentos cadastrados</h1>

        <div class="container col-md-12">   
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Arquivo</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($docs as $doc):
                <tr>
                    <td> {{ $doc->id }} </td>
                    <td> {{ $doc->titulo }} </td>
                    <td> {{ $doc->nome_arquivo }} </td>
                    <td> {{ $doc->nome_tipo}} </td>
                    <td>
                        <a href="/DocOn/public/documentos/editar/{{$doc->id}}">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                       
                        <a href="/DocOn/public/documentos/excluir/{{$doc->id}}">
                            <button type="button" class="btn btn-danger">Apagar</button>
                        </a>
                    </td>
                    
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>

        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
