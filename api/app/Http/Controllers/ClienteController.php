<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
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
        $clientes = Clientes::paginate(2);
        return response()->json(['clientes' => $clientes]);
    }

    public function buscarClientePorId($id)
    {
        $cliente = Clientes::find($id);
        if(!$cliente){
            return response()->json(['message' => 'Cliente não encontrado']);
        }
        return response()->json(['Cliente' => $cliente]);
    }

    public function cadastrarCliente(ClienteRequest $request)
    {
        try{
            $cliente = new Clientes();

            $cliente->fill($request->all());
            $cliente->save();

            return response()->json(
                ['message' => 'Cliente cadastrado'], 201);

        }catch (Exception $exception){
            return response()->json(
                ['error' => $exception->getMessage()]);
        }
    }

    public function atualizarCliente(ClienteRequest $request, $id)
    {
        $cliente = Clientes::find($id);
        if(!$cliente){
            return response()->json(['message' => 'Cliente não encontrado']);
        }

        try{
            $cliente->fill($request->all());
            $cliente->save();

            return response()->json(
                ['message' => 'Cliente atualizado'], 201);

        }catch (Exception $exception){
            return response()->json(
                ['error' => $exception->getMessage()]);
        }

    }

    public function excluirCliente($id)
    {
        $cliente = Clientes::find($id);
        if(!$cliente){
            return response()->json(['message' => 'Cliente não encontrado']);
        }

        try{
            $cliente->delete($id);

            return response()->json(
                ['message' => 'Cliente excluído'], 201);

        }catch (Exception $exception){
            return response()->json(
                ['error' => $exception->getMessage()]);
        }

    }
}
