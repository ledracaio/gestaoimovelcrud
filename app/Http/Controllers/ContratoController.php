<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Cliente;
use App\Models\Imovel;

use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = Contrato::all();
        return view('contratos.index', [
            'contratos' => $contratos,
            'title' => 'Contratos'
        ]);
    }

    public function create()
    {
        $clientes = Cliente::all();
        $imoveis = Imovel::all();

        return view('contratos.create', [
            'clientes' => $clientes,
            'imoveis' => $imoveis,
            'title' => 'Novo Contrato'
        ]);
    }

    public function store(Request $request)
    {
        $contrato = $request->validate([
            'cliente_id' => 'required',
            'imovel_id' => 'required',
            'data_inicio' => 'required',
            'data_fim' => 'nullable'
        ]);

        Contrato::create($contrato);
        return redirect()->back();
    }

    public function show(Contrato $contrato)
    {
        return view('contratos.show', [
            'contrato' => $contrato,
            'title' => 'Contrato'
        ]);
    }

    public function delete(Contrato $contrato)
    {
        return view('contratos.delete', [
            'text' => 'Deseja excluir o contrato?',
            'contrato' => $contrato,
            'title' => 'Excluir Contrato'
        ]);
    }

    public function destroy(Contrato $contrato)
    {
        $contrato->delete();
        return redirect()->route('contratos.index');
    }
}
