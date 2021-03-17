<?php

namespace App\Http\Controllers;

use App\Documento;
use App\TipoDocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function home()
    {
        return view('documentos.home');
    }

    public function index()
    {   
      $docs = DB::select('select d.id,d.titulo,d.nome_arquivo,tp.nome_tipo
      from documentos d
      join tipo_documento tp on d.tipo_id = tp.id');
        //print_r($docs);
        return view('documentos.lista')->with('docs', $docs);
    }

    public function cadastro()
    {
        // $tipoDocs = DB::select('select * from tipo_documento');
        $tipoDocs = TipoDocumento::all();
        return view('documentos.cadastro')->with('tipoDocs', $tipoDocs);
    }
    public function adicionar(Request $request)
    {
       
        $titulo = $request->input('titulo');
        $arquivo = $request->input('nome_arquivo');
        $tipoId = $request->input('tipo_id');

        DB::insert('insert into documentos(titulo, nome_arquivo, tipo_id) values (?,?,?)',
        array($titulo, $arquivo, $tipoId));

        return $this->index();
        
    }

    public function editar(Request $request){
        $tipoDocs = TipoDocumento::all();        
        $id = $request->route('id');
        $doc = Documento::find($id);
        return view('documentos.editar')->with(['doc' => $doc, 'tipoDocs' => $tipoDocs]);
    }

    public function atualizar(Request $request)
    {
        $documento = Documento::find($request->input('id'));
        $documento->titulo = $request->input('titulo');
        $documento->nome_arquivo = $request->input('nome_arquivo');
        $documento->tipo_id = $request->input('tipo_id');

        $documento->save();

        return $this->index();
        
    }

    public function excluir(Request $request){
        $documento = Documento::find($request->route('id'));
        $documento->delete();
        return $this->index();
    }
}

