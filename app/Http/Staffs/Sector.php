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
     * Função para listar os setores de cada cliente
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function list(Request $request)
    {
        $sectors = ClientModel::find($request->id)->clientSectors;
        
        return $sectors;
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
  
    }

    /**
     * Função para deletar registro de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function del(Request $request)
    {
        $sectors =ClientModel::find($request->id)->clientSectors;

        $sector = $sectors->find($request->id_sector);

        $deleter = new SectorDeleter;

        $deletedSector = $deleter->deleteSector($sector);

        $request->session()->flash('mensagem',"O registro $deletedSector foi excluido com sucesso");

    }

    /**
     * Método para exibir dados e ALTERAR dados do setor em formulario
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

    /**
     * Formulario para EXBIBIÇÃO dos dados dos clientes.
     * 
     */
    public static function exhibition(Request $request)
    {

        $client = ClientModel::find($request->id);

        $sector = ClientSector::find($request->id_sector);

        $contacts = $sector->clientContacts;
        
        $viewOnly = true;
 
        $form = 'clients.viewSector';

        $contactsCounts = $contacts->count();
        
        echo view('clients.editSectorForm',compact('client','sector','contacts','form','contactsCounts','viewOnly'));

    }
    
    /**
     * Retorna um formulario de criação de um novo setor do cliente
     * 
     */
    public static function createForm(Request $request)
    {
        $client = ClientModel::find($request->id);
        
        $viewOnly=false;
        
        echo view('Sectors.addSector',compact('client','viewOnly'));

    }
    
}
