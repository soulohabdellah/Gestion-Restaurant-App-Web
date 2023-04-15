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

    public function deleteClient($id_client)
    {
        $client = Client::find($id_client);
        
        if (!$client) {
            return redirect()->back()->with('error', 'Le client que vous essayez de supprimer n\'existe pas.');
        }
        
        $client->delete();
        
        return redirect()->back()->with('success', 'Le client a été supprimé avec succès.');
    }

    public function updateClient($id_client)
    {
        $client = Client::find($id_client);
        
        if (!$client) {
            return redirect()->back()->with('error', 'Le client que vous essayez de supprimer n\'existe pas.');
        }

        
        return view('modifierClient')->with('client',  $client);
    }
}
