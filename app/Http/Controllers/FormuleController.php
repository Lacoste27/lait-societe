<?php

namespace App\Http\Controllers;

use App\Models\Formule;
use App\Models\Produit;
use Illuminate\Http\Request;

class FormuleController extends Controller
{
    //
    public function index()
    {
        $produit_list = Produit::all();
        return view('pages.admin.formule.produit_list', ['produit_list' => $produit_list]);
    }

    public function ajout($id)
    {
        $produit = Produit::find($id);
        $formule_list = Formule::getFormule($id);
        return view('pages.admin.formule.ajout_formule', ['produit' => $produit, 'formule_list' => $formule_list]);
    }

   
}
