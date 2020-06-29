<?php

namespace App\Http\Controllers;

use App\ClientSector;
use App\Http\Staffs\Client;
use Illuminate\Http\Request;
use App\Client as ClientModel;
use App\Http\Requests\ClientsFormRequest;
use App\Http\Staffs\Sector;

class SectorController extends Controller
{    



    /**
     * Metodo de requisicao de uma lista de contatos por setor
     * 
     * @param   int $clientId
     * @return  \Illuminate\View\View
     */
    public function sectors(Request $request)
    {
        Sector::list($request);
    }

    /**
     * Edita/Corrige dados de clientes ja armazenados
     * 
     * @param   int $id
     * @param   int $id_Sector
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function clientEdit(ClientsFormRequest $request)
    {
        Client::edit($request);
        return redirect()->route('list_Sectors', array('id'=>$request->id)); 
    }

    /**
     * Metodo retorna o formulario preenchido para ser alterado
     * 
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function sectorEditForm(Request $request)
    {
        Client::editableForm($request);
    }

    /**
     * Metodo retorna formulario pronto para novo Registro
     * 
     * @param   int $id
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function createSectorForm(int $id, Request $request)
    { 
        // vc já tem um método que cria um cliente, qual a necessidade de outro?
        $client = ClientModel::find($id);
        $form = 'Sectors.addSector';
        $viewOnly=false;
        return view('clients.editSectorForm',compact('client','form','viewOnly'));
    }

    /**
     * Metodo para persistencia de novo registro em DB
     * 
     * @param   int $id
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function storeSector(int $id, Request $request)
    {
        Sector::store($request); 

        return redirect()->route('list_sectors', array('id'=>$request->id));

    }

    /**
     * Metodo para deleção de registros do DB
     * 
     * @param   int $id
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Sector::delete($request);
        return redirect()->route('list_sectors', array('id'=>$request->id)); 
    }

    /**
     * Metodo retorna o formulario apenas para visualização
     * 
     * @param   int $id
     * @param   int $id_Sector
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function SectorView(int $id, int $id_Sector, Request $request)
    {

        $client = ClientModel::find($id);

        $sector = ClientSector::find($id_Sector);

        $contacts = $sector->clientContacts;
        
        $viewOnly = true;
 
        $form = 'clients.viewSector';

        $contactsCounts = $contacts->count();
        
        return view('clients.editSectorForm',compact('client','Sector','contacts','form','contactsCounts','viewOnly'));
    }

}
