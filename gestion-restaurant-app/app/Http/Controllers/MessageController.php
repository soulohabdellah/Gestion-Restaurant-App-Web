<?php

namespace App\Http\Controllers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    ////Changer le statut de message par administrateur
    public function modifyMessage($id_message)
    {   
    if(!$this->isConnectedAdministrateur()){
        return view('authentifications/authentificationAdministrateur');

    }else{
        $message = Message::find($id_message);
        if (!$message) {
            return redirect()->back()->with('error', 'Le message que vous essayez de modifier n\'existe pas.');
        } 
        $message->lu = True; 
        $message->save();    
        return redirect()->back()->with('success', 'Le message a été modifié avec succès.');
    }

    }
    ////Supprimer message par Administrateur
    public function deleteMessage($id_message)
    {
        if(!$this->isConnectedAdministrateur()){
            return view('authentifications/authentificationAdministrateur');
        }else{

        $message = Message::find($id_message);
        
        if (!$message) {
            return redirect()->back()->with('error', 'Le message que vous essayez de supprimer n\'existe pas.');
        }
        
        $message->delete();       
        return redirect()->back()->with('success', 'Le message a été supprimé avec succès.');
    }
    }
    ////Afficher la page de gestion de messages par administrateur
    function gestionMessage(){
        if(!$this->isConnectedAdministrateur()){

            return view('authentifications/authentificationAdministrateur');

        }else{

        $listMessages= Message::all();
        return view('gestionMessages/gestionMessage')->with('listMessages', $listMessages);
        }
      
    }
    ////Affichage form de contact au client
    function getFormContact(){
        return view('gestionMessages/formMessage');
    }
    ////Creation de message par client
    public function creerMessage(Request $request)
    {

        $message = new Message;
        $message->nom = $request->Nom;
        $message->email = $request->Email;
        $message->message = $request->Message;
        $uploadedFile = $request->file('Fichier');
        if ($uploadedFile) {
            $uploadedFileUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
            $message->fichier = $uploadedFileUrl;
        }

        $message->save();
       
        return view('gestionMessages/formMessage')->with('message', 'Message bien envoyé le ' . $message->created_at);
    }
}
