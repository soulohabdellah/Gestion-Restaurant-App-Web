<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategorieController extends Controller
{
    function gestionCategorie(){
        $listCategories= Categorie::all();
        return view('gestionCategorie')->with('categorie', $listCategories);
      
    }
}
