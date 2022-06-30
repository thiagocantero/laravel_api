<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClientesApiController extends Controller
{
    public function getAllClientes() {
        // iremos pegar a coleção de todos os clientes aqui
        $clientes = Cliente::get()->toJson(JSON_PRETTY_PRINT);
        return response($clientes, 200);
      }
  
      public function createCliente(Request $request) {
        // Criação do Cliente com Active Record Pattern
        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->save();

        //Retorna em JSON a resposta e a mensagem de "Registro de cliente criado"
        return response()->json([
            "mensagem" => "Registro de Cliente criado"
        ], 201);
      }
  
      public function getCliente($id) {
        // Verifica se o registro existe, caso exista, pega a coleção e tranforma em JSON, caso não encontre
        // retorna com "Cliente não encontrado!"
        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cliente, 200);
          } else {
            return response()->json([
              "mensagem" => "Cliente não encontrado!"
            ], 404);
          }
      }
      
  
      public function updateCliente(Request $request, $id) {
        // Verifica se o cliente existe, caso exista pega as informações, trata se for valor nulo com o ternário (ambos os valores cliente,telefone)
        // ao final salva com o método Active Record Pattern e mostra a mensagem "Registros atualizados com sucesso!"
        // Caso não há registro retorna a mensagem "Cliente não encontrado!"
        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::find($id);
            $cliente->nome = is_null($request->nome) ? $cliente->nome : $request->nome;
            $cliente->telefone = is_null($request->telefone) ? $cliente->telefone : $request->telefone;
            $cliente->save();
    
            return response()->json([
                "mensagem" => "Registros atualizados com sucesso!"
            ], 200);
            } else {
            return response()->json([
                "mensagem" => "Cliente não encontrado!"
            ], 404);
            
        }
      }
  
      public function deleteCliente ($id) {
        // método para apagar um cliente, verifica se o registro existe. Caso exista efetua a remoção com método delete().
        // Caso não exista, retorna a mensagem "Cliente não encontrado!"
        if(Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::find($id);
            $cliente->delete();
    
            return response()->json([
              "mensagem" => "Registros apagados!"
            ], 202);
          } else {
            return response()->json([
              "mensagem" => "Cliente não encontrado!"
            ], 404);
          }
        
      }
}
