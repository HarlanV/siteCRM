<?php


namespace App\Http\Staffs;

use App\Client as Client_model;
use Illuminate\Http\Request;

class Client
{
// Methods

    /**
     * Função responsável por criar lista de clientes
     * @param   $App\Http\Requests\ClientsFormRequest
     * @return  $view [editar]
     */
    public static function listClients(Request $request)
    {
        // consulta e ordena por ordem alfabetica
        $clients = Client_model::query()->orderBy('name')->get();

        // Mensagem: "cliente __ adicionado com sucesso"
        $mensagem = $request->session()->get('mensagem');

        // Mudar de view para lista a ser exibida posteriormente [editar]
         echo view('clients.clients', compact('clients','mensagem'));
    }

    /**
     * Armazena clientes no banco de dados
     * 
     * @param   Illuminate\Http\request $request
     */
    public static function storeClient(Request $request)
    {
        // Nomes dos clientes
        $cliente= Client_model::create(['name'=>$request->name]);

        // Adiciona o contato com o setor
        $setor = $request->sector;
        $contato = $cliente->contacts()->create(['sector' =>$setor]);

        // Adiciona o telefone do setor à lista de telefones

        $telefone = $contato->phones()->create(['phone'=>$request->phone]);

        $cliente->save();
        
        // mensagem de confirmação. Iniciando seção.
        $request->session()->flash('mensagem',"Cliente {$cliente->nome} e seus contatos inserido com sucesso");
    }

    /**
     * Retorna/Redireciona para formulario de criação de clientes
     * 
     * @param   \Illuminate\Http\request    $request
     */
    public static function deleteClient(Request $request){

        Client_model::destroy($request->id);
        $request->session()->flash('mensagem',"O Cliente foi excluido com sucesso");

    }
}
