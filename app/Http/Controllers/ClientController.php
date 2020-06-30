<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Client;
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
        Client::list($request);
    }
    
    /**
     * Redirect to a client creation form 
     * 
     * @param   null
     * @return  \Illuminate\View\View
     */
    public function createClient()
    {
        // variable to redirect to correct blade at the end
        $form = 'clients.create';

        // variable to hide "save" and "add" button
        $viewOnly=false;
        return view('clients.editSectorForm',compact('form','viewOnly'));   
    }

    /**
     * Store new clients on DB
     * 
     * @param   \App\Http\Requests\ClientsFormRequest    $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function store(ClientsFormRequest $request)
    { 
        Client::store($request);      
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
        Client::delete($request);
        return redirect()->route('list_clients'); 
    }


}
