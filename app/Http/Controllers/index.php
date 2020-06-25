<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class index extends Controller
{
    /**
     * Metodo de redirecionamento e exibição da Home do site
     */
    function mainView(){
        return view('index');    
    }
}
