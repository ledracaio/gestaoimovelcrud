<?php

namespace App\Http\Controllers;

use App\Models\TipoImovel;
use Illuminate\Http\Request;

class TipoImovelController extends Controller
{
    public function index()
    {
        $tipos = TipoImovel::all();
        return view('tipos.index', [
            'tipos' => $tipos,
            'title' => 'Tipos de Imóvel'
        ]);
    }

    public function create()
    {
        return view('tipos.create', [
            'title' => 'Novo Tipo'
        ]);
    }

    public function store(Request $request)
    {
        $tipo = $request->validate([
            'nome' => 'required'
        ]);

        TipoImovel::create($tipo);
        return redirect()->back();
    }

    public function show(TipoImovel $tipo)
    {
        return view('tipos.show', [
            'tipo' => $tipo,
            'title' => 'Tipo - ' . $tipo->nome
        ]);
    }

    public function delete(TipoImovel $tipo)
    {
        return view('tipos.delete', [
            'text' => 'Deseja excluir o tipo?',
            'tipo' => $tipo,
            'title' => 'Excluir Tipo'
        ]);
    }

    public function destroy(TipoImovel $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index');
    }
}
