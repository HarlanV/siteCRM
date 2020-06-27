<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class index extends Controller
{
    // todo controller tem que ter no final controller. no caso IndexController.
    // mas não vejo a necessidade desse controlador apenas para um redirecionamento.
    /**
     * Metodo de redirecionamento e exibição da Home do site
     */
    function mainView(){
        return view('index');    
    }
}
