<?php

namespace App\Http\Controllers;

use App\Models\EtatProduitStock;
use App\Models\Formule;
use App\Models\MatiereStock;
use App\Models\Produit;
use App\Models\ProduitStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProduitController extends Controller
{
    //
    public function index()
    {
        $produit_list = Produit::all();
        return view("pages.admin.produit.liste", ["produit_list" => $produit_list]);
    }

    public function etat()
    {
        $etat_produit = EtatProduitStock::all();
        return view('pages.admin.produit.etat', ['etat_produit' => $etat_produit]);
    }

    public function ajout()
    {
        $produit_list = Produit::all();
        return view('pages.admin.produit.ajout_produit', ["produit_list" => $produit_list]);
    }

    public function store(Request $request)
    {
        $quantite_fini = $request->quantite_fini;
        $produit_id = $request->produit_id;
        $ingredient = Formule::getQuantite($quantite_fini, $produit_id);
        if (count(ProduitStock::getStockInsuffisant($ingredient)) > 0) {
            return Redirect::back()->withErrors(['message' => ProduitStock::getInsuffisantName($ingredient),"proposition" => ProduitStock::quantite_proposer($ingredient,$quantite_fini) ]);
        } else {
            MatiereStock::take_off($ingredient);
            ProduitStock::create([
                "produit_id" => $produit_id,
                "entre" => $quantite_fini,
                "sortie" => 0,
                "date" => now(),
                "prixunitaire" => 2000
            ]);
            return redirect(route('produit_stock_etat'));
        }
    }

    public function sell()
    {
        $produit_list = Produit::all();
        return view('pages.admin.produit.vente', ["produit_list" => $produit_list]);
    }

    public function sell_product(Request $request)
    {
        $c = $request->quantite_vendre;
        $produit_id = $request->produit_id;
        ProduitStock::create([
            "produit_id" => $produit_id,
            "entre" => 0,
            "sortie" => $request->quantite_vendre,
            "date" => now(),
            "prixunitaire" => 2000
        ]);
        return redirect(route('produit_stock_etat'));
    }

   
}
