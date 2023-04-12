<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
    function gestionClient(){
        $listClients= Client::all();
        return view('gestionClient')->with('listClients', $listClients);
      
    }
}
