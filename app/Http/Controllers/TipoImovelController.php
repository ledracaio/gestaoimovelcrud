<?php

namespace App\Http\Controllers;

use App\Models\TipoImovel;
use Illuminate\Http\Request;

class TipoImovelController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);

        $sort = request('sort', 'nome');
        $direction = request('direction', 'asc');

        $tipos = TipoImovel::orderBy($sort, $direction)
            ->paginate($perPage)
            ->withQueryString();
        return view('tipos.index', [
            'tipos' => $tipos,
            'title' => 'Tipos de Imóvel',
            'subtitle' => 'Organize as categorias dos imóveis cadastrados.'
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
        $dados = $request->validate([
            'nome' => 'required'
        ]);

        TipoImovel::create($dados);

        if ($request->has('add_another')) {
            return redirect()->route('tipos.create')
                ->with('success', 'Tipo de imóvel cadastrado com sucesso!')
                ->with('add_another', true);
        }

        return redirect()->route('tipos.index')
            ->with('success', 'Tipo de imóvel cadastrado com sucesso!');
    }

    public function apiStore(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required'
        ]);

        $tipo = TipoImovel::create($dados);

        return response()->json($tipo);
    }

    public function show(TipoImovel $tipo)
    {
        return view('tipos.show', [
            'tipo' => $tipo,
            'title' => 'Tipo - ' . $tipo->nome
        ]);
    }

    public function edit(TipoImovel $tipo)
    {
        return view('tipos.edit', [
            'tipo' => $tipo,
            'title' => 'Editar Tipo'
        ]);
    }

    public function update(Request $request, TipoImovel $tipo)
    {
        $dados = $request->validate([
            'nome' => 'required'
        ]);

        $tipo->update($dados);

        return redirect()->route('tipos.index');
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
        try {
            $tipo->delete();
            return redirect()->route('tipos.index')
                ->with('success', 'Tipo de imóvel excluído com sucesso!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()
                ->with('error', 'Não é possível excluir este tipo de imóvel pois existem imóveis vinculados a ele.');
        }
    }
}
