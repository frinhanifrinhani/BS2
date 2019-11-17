<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Endereco;
use App\Http\Requests\ClienteRequest;
use Mockery\Exception;
use Tymon\JWTAuth\JWTAuth;

class ClienteController extends Controller
{
    private $jwtAuth;

    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }

    public function listarClientes()
    {
        $clientes = Cliente::with('enderecos')->get();
        return response()->json(['clientes' => $clientes]);

    }

    public function buscarClientePorId($id)
    {
        $cliente = Cliente::with('enderecos')->where('id', $id)->get();

        if (empty($cliente) || count($cliente) == 0) {
            return response()->json(['message' => 'Cliente não encontrado']);
        }
        return response()->json(['cliente' => $cliente]);
    }

    public function cadastrarCliente(ClienteRequest $request)
    {
        try {
            $cliente = new Cliente();
            $cliente->fill($request->all());

            $endereco = new Endereco();
            $endereco->fill($request->all());

            $cliente->save();
            $cliente->enderecos()->save($endereco);

            return response()->json(
                ['message' => 'Cliente cadastrado'], 201);

        } catch (Exception $exception) {
            return response()->json(
                ['error' => $exception->getMessage()]);
        }
    }

    public function atualizarCliente(ClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado']);
        }

        try {
            $cliente->fill($request->all());
            $cliente->save();

            $endereco = Cliente::find($id)->enderecos;
            $endereco->fill($request->all());
            $endereco->save();

            return response()->json(
                ['message' => 'Cliente atualizado'], 201);

        } catch (Exception $exception) {
            return response()->json(
                ['error' => $exception->getMessage()]);
        }

    }

    public function excluirCliente($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado']);
        }

        try {
            $cliente->delete($id);

            return response()->json(
                ['message' => 'Cliente excluído'], 201);

        } catch (Exception $exception) {
            return response()->json(
                ['error' => $exception->getMessage()]);
        }

    }
}
