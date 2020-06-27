<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

// novamente um controller sem o nome controller.
class ManageProject extends Controller
{
    function soFar(){
        echo view('viewPM');    
    }
}
