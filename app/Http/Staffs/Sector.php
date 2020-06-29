<?php

namespace App\Http\Staffs;

use App\ClientSector;
use Illuminate\Http\Request;
use App\Client as ClientModel;
use App\services\SectorCreator;
use App\services\SectorDeleter;

class Sector
{

    /**
     * Função para listar os registros de cada cliente
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function list(Request $request)
    {
        $sectors = ClientModel::find($request->id)->clientSectors;

        $name = ClientModel::find($request->id)->name;

        $clientId = $request->id;

        $mensagem = $request->session()->get('mensagem');

        echo view('sectors.Sectors',compact('sectors','name','clientId','mensagem'));  
   
    }
    
    /**
     * Função para armazenar registro de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function store(Request $request)
    {
        $sectorCreator = new SectorCreator;

        $client = $sectorCreator->createSector($request);

        $request->session()->flash('mensagem',"O setor {$request->sector} foi inserido com sucesso");
  
    }

    /**
     * Função para deletar registro de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function delete(Request $request)
    {
        $sectors =ClientModel::find($request->id)->clientSectors;

        $sector = $sectors->find($request->id_sector);

        $deleter = new SectorDeleter;

        $deletedSector = $deleter->deleteSector($sector);

        $request->session()->flash('mensagem',"O registro $deletedSector foi excluido com sucesso");

    }

    /**
     * Função para armazenar registro de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function editableForm(Request $request)
    {
        $client = ClientModel::find($request->id);

        $sector = ClientSector::find($request->id_Sector);

        $contacts = $sector->clientContacts;
        
        $viewOnly = false;

        $form = 'clients.edit';

        $contactsCounts = $contacts->count();

        echo view('clients.editSectorForm',compact('client','Sector','contacts','form','contactsCounts','viewOnly'));
    }


    
}
