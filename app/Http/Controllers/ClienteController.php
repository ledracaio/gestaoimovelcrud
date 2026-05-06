<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', [
            'clientes' => $clientes,
            'title' => 'Clientes'
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
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
