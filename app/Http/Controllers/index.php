<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class index extends Controller
{
    function mainView(){
        echo view('index');    
    }
}
