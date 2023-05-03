<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function isConnectedLivreur(){
       
        if(session('id_livreur')){
            return true;
        }else{
            return false;
        }
    }
    function isConnectedClient(){
       
        if(session('id_client')){
            return true;
        }else{
            return false;
        }
    }
    function isConnectedAdministrateur(){
       
        if(session('id_administrateur')){
            return true;
        }else{
            return false;
        }
    }
    function isConnectedServeur(){
       
        if(session('id_client')){
            return true;
        }else{
            return false;
        }
    }
}
