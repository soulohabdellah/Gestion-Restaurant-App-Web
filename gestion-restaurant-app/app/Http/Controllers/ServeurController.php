<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serveur;
class ServeurController extends Controller
{
    function gestionServeur(){
        $listServeurs= Serveur::all();
        return view('gestionServeur')->with('serveur', $listServeurs);
      
    }
}
