<?php

namespace App\Http\Controllers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    public function modifyMessage($id_message)
    {

        $message = Message::find($id_message);
        if (!$message) {
            return redirect()->back()->with('error', 'Le message que vous essayez de modifier n\'existe pas.');
        }
        
        $message->lu = True; 
        $message->save();    
        return redirect()->back()->with('success', 'Le message a été modifié avec succès.');

    }
    public function deleteMessage($id_message)
    {
        $message = Message::find($id_message);
        
        if (!$message) {
            return redirect()->back()->with('error', 'Le message que vous essayez de supprimer n\'existe pas.');
        }
        
        $message->delete();       
        return redirect()->back()->with('success', 'Le message a été supprimé avec succès.');
    }
    function gestionMessage(){
        $listMessages= Message::all();
        return view('gestionMessages/gestionMessage')->with('listMessages', $listMessages);
      
    }
    function getFormContact(){
        return view('gestionMessages/formMessage');
    }
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
