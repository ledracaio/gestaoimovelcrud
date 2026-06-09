<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ClienteController extends Controller
{
    public function index()
    {
        $perPage = request('per_page', 10);

        $sort = request('sort', 'id');
        $direction = request('direction', 'asc');

        $clientes = Cliente::orderBy($sort, $direction)
            ->paginate($perPage)
            ->withQueryString();

        return view('clientes.index', [
            'clientes' => $clientes,
            'title' => 'Clientes',
            'subtitle' => 'Gerencie os clientes cadastrados no sistema.'
        ]);
    }

    public function create()
    {
        return view('clientes.create', [
            'title' => 'Novo Cliente'
        ]);
    }

    public function store(Request $request)
    {
        $cliente = $request->validate([
            'nome' => 'required|min:4',
            'telefone' => 'nullable',
            'email' => 'nullable|email'
        ]);

        Cliente::create($cliente);
        return redirect()->route('clientes.index');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', [
            'cliente' => $cliente,
            'title' => 'Cliente - ' . $cliente->nome
        ]);
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', [
            'cliente' => $cliente,
            'title' => 'Editar Cliente'
        ]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $dados = $request->validate([
            'nome' => 'required|min:4',
            'telefone' => 'required',
            'email' => 'required'
        ]);

        $cliente->update($dados);

        return redirect()->route('clientes.index');
    }

    public function delete(Cliente $cliente)
    {
        return view('clientes.delete', [
            'text' => 'Deseja excluir o cliente?',
            'cliente' => $cliente,
            'title' => 'Excluir Cliente'
        ]);
    }

    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();

            return redirect()->route('clientes.index')
                ->with('success', 'Cliente excluído com sucesso!');

        } catch (QueryException $e) {

            return redirect()->back()
                ->with('error', 'Não é possível excluir este cliente pois ele possui contratos vinculados.');
        }
    }
}
