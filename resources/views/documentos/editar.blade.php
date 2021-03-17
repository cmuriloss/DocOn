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

                    <h1>Editar documento</h1>

        <form action='/DocOn/public/documentos/atualizar'>
      
        <div class="form-group">
          <label for="exampleFormControlInput1">Título:</label>
          <input type="text" class="form-control" name="titulo" value="{{$doc->titulo}}">
          <input type="text" class="form-control hide" name="id" value="{{$doc->id}}">
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Descrição:</label>
          <textarea class="form-control" rows="3" name="nome_arquivo">{{$doc->nome_arquivo}}</textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Selecionar tipo de arquivo:</label>
          <select class="form-control" name="tipo_id">
            <option>Selecionar</option>

            @foreach($tipoDocs as $tipoDoc)
                @if($tipoDoc->id == $doc->tipo_id)
                    <option selected value="{{ $tipoDoc->id}}">{{ $tipoDoc->nome_tipo}}</option>
                @else
                    <option value="{{ $tipoDoc->id}}">{{ $tipoDoc->nome_tipo}}</option>
                @endif
            @endforeach

          </select>
        </div>
        
       
<button type="button" class="btn btn-secondary">Voltar</button>

<button type="submit" class="btn btn-success">Salvar</button> 
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
