<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\TipoImovel;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ImovelController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::all();
        return view('imoveis.index', [
            'imoveis' => $imoveis,
            'title' => 'Imóveis'
        ]);
    }

    public function create()
    {
        $tipos = TipoImovel::all();

        return view('imoveis.create', [
            'tipos' => $tipos,
            'title' => 'Novo Imóvel'
        ]);
    }

    public function store(Request $request)
    {
        $imovel = $request->validate([
            'titulo' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'valor' => 'required',
            'status' => 'required',
            'tipo_imovel_id' => 'required'
        ]);

        Imovel::create($imovel);
        return redirect()->back();
    }

    public function show(Imovel $imovel)
    {
        return view('imoveis.show', [
            'imovel' => $imovel,
            'title' => 'Imóvel - ' . $imovel->titulo
        ]);
    }

    public function edit(Imovel $imovel)
    {
        $tipos = TipoImovel::all();

        return view('imoveis.edit', [
            'imovel' => $imovel,
            'tipos' => $tipos,
            'title' => 'Editar Imóvel'
        ]);
    }

    public function update(Request $request, Imovel $imovel)
    {
        $dados = $request->validate([
            'titulo' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'valor' => 'required',
            'status' => 'required',
            'tipo_imovel_id' => 'required'
        ]);

        $imovel->update($dados);

        return redirect()->route('imoveis.index');
    }

    public function delete(Imovel $imovel)
    {
        return view('imoveis.delete', [
            'text' => 'Deseja excluir o imóvel?',
            'imovel' => $imovel,
            'title' => 'Excluir Imóvel'
        ]);
    }

    public function destroy(Imovel $imovel)
    {
        try {
            $imovel->delete();

            return redirect()->route('imoveis.index')
                ->with('success', 'Imóvel excluído com sucesso!');

        } catch (QueryException $e) {

            return redirect()->back()
                ->with('error', 'Não é possível excluir este imóvel pois ele está vinculado a contratos.');
        }
    }
}
