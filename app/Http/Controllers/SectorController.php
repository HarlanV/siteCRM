<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientsFormRequest;
use App\Http\Staffs\Sector;

class SectorController extends Controller
{    

    /**
     * Return a list of sector of the selected client
     * 
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function sectors(Request $request)
    {
        Sector::list($request);
    }

    /**
     * Edit data from an already saved client
     * 
     * @param   \Http\Requests\ClientsFormRequest $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function edit(ClientsFormRequest $request)
    {
        Client::edit($request);
        return redirect()->route('list_sectors', array('id'=>$request->id)); 
    }

    /**
     * Return an already filled form which can be edited
     * 
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function sectorEditForm(Request $request)
    {
        Client::editableForm($request);
    }

    /**
     * Return a new Sector form, tha will be stored inside a specific client
     * 
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function createSector(Request $request)
    { 
        Sector::createForm($request);
    }

    /**
     * Store new Register inside a client on DB
     * 
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Sector::store($request); 

        return redirect()->route('list_sectors', array('id'=>$request->id));

    }

    /**
     * Metodo para deleção de registros do DB
     * 
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Sector::delete($request);
        return redirect()->route('list_sectors', array('id'=>$request->id)); 
    }

    /**
     * Return an already filled form, which won't affect DB data. Just to visualisation.
     * 
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function SectorView(Request $request)
    {

        Sector::exhibition($request);

     }

}
