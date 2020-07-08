<?php

namespace App\Http\Controllers;
use App\Client as ClientModel;
use Illuminate\Http\Request;
use App\Http\Requests\ClientsFormRequest;


class ClientController extends Controller
{    

    /**
     * This method is show a list of clients on DB
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    public function clients(Request $request)
    {   
        $clients = ClientModel::list();

        $mensagem = $request->session()->get('mensagem');

        return view('clients.clients', compact('clients','mensagem'));
    }
    
    /**
     * Redirect to a client creation form 
     * 
     * @param   null
     * @return  \Illuminate\View\View
     */
    public function createClient()
    {

        // variable to hide "save" and "add" button
        $viewOnly=false;
        return view('clients.create',compact('viewOnly'));   
    }

    /**
     * Store new clients on DB
     * 
     * @param   \App\Http\Requests\ClientsFormRequest    $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function store(ClientsFormRequest $request)
    { 
        ClientModel::store($request);

        return redirect()->route('list_clients');
    }

    /**
     * Delete client from DB
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  \Illuminate\Routing\RedirectController
     */
    public function destroy(Request $request)
    {
        ClientModel::del($request);

        return redirect()->route('list_clients'); 
    }


}
