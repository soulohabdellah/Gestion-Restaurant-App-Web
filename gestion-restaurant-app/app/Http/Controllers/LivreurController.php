<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livreur;
class LivreurController extends Controller
{
    function gestionLivreur(){
        $listLivreurs= Livreur::all();
        return view('gestionLivreur')->with('livreur', $listLivreurs);
      
    }
}
