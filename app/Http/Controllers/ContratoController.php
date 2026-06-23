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
        $perPage = request('per_page', 10);

        $sort = request('sort', 'id');
        $direction = request('direction', 'asc');

        $contratos = Contrato::with([
            'cliente',
            'imovel'
        ])
            ->orderBy($sort, $direction)
            ->paginate($perPage)
            ->withQueryString();
        return view('contratos.index', [
            'contratos' => $contratos,
            'title' => 'Contratos',
            'subtitle' => 'Acompanhe os contratos vinculados a clientes e imóveis.'
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
        $dados = $request->validate([
            'cliente_id' => 'required',
            'imovel_id' => 'required',
            'data_inicio' => 'required',
            'data_fim' => 'nullable'
        ]);

        Contrato::create($dados);

        if ($request->has('add_another')) {
            return redirect()->route('contratos.create')
                ->with('success', 'Contrato cadastrado com sucesso!')
                ->with('add_another', true);
        }

        return redirect()->route('contratos.index')
            ->with('success', 'Contrato cadastrado com sucesso!');
    }

    public function show(Contrato $contrato)
    {
        return view('contratos.show', [
            'contrato' => $contrato,
            'title' => 'Contrato'
        ]);
    }

    public function edit(Contrato $contrato)
    {
        $clientes = Cliente::all();
        $imoveis = Imovel::all();

        return view('contratos.edit', [
            'contrato' => $contrato,
            'clientes' => $clientes,
            'imoveis' => $imoveis,
            'title' => 'Editar Contrato'
        ]);
    }

    public function update(Request $request, Contrato $contrato)
    {
        $dados = $request->validate([
            'cliente_id' => 'required',
            'imovel_id' => 'required',
            'data_inicio' => 'required',
            'data_fim' => 'required'
        ]);

        $contrato->update($dados);

        return redirect()->route('contratos.index');
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
        try {
            $contrato->delete();
            return redirect()->route('contratos.index')
                ->with('success', 'Contrato excluído com sucesso!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->with('error', 'Não é possível excluir este contrato pois existem dependências vinculadas.');
        }
    }
}
