<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\TipoImovel;
use Illuminate\Http\Request;

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
        $imovel->delete();
        return redirect()->route('imoveis.index');
    }
}
