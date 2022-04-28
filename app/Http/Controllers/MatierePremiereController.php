<?php

namespace App\Http\Controllers;

use App\Models\AchatFaire;
use App\Models\EtatStockMatiere;
use App\Models\MatierePremiere;
use App\Models\MatiereStock;
use Illuminate\Http\Request;

class MatierePremiereController extends Controller
{
    //
    public function index()
    {
        $matiere_list = MatierePremiere::all();
        $data = array(
            "matiere_list" => $matiere_list
        );
        return view('pages.admin.matiere_liste', $data);
    }

    public function ajout()
    {
        $matiere_list = MatierePremiere::all();
        $data = array(
            "matiere_list" => $matiere_list
        );
        return view("pages.admin.ajout_stock", $data);
    }

    public function store(Request $request)
    {
        $matiere_premiere_id = $request->matiere_premiere_id;
        $entre = $request->entre;
        $prixunitaire = $request->prixunitaire;

        MatiereStock::create([
            "matiere_premiere_id" => $matiere_premiere_id,
            "entre" => $entre,
            "sortie" => 0,
            "date" => now(),
            "prixunitaire" => $prixunitaire
        ]);

        return redirect(route('matiere_stock_etat'));
    }

    public function etat()
    {
        $etat = EtatStockMatiere::with('matiere_premieres')->get();
        $data = array(
            "etat_list" => $etat
        );
        return view('pages.admin.matierepremiere.etat', $data);
    }

    public function achat_faire()
    {
        $achat_faire = AchatFaire::all();
        $data = array(
            "achat_faire" => $achat_faire
        );
        return view('pages.admin.matierepremiere.achat_faire', $data);
    }

    public function take_off($matiere_premiere_list)
    {
        foreach ($matiere_premiere_list as $matiere_premiere) {
            MatiereStock::create([
                "matiere_premiere_id" => $matiere_premiere->id,
                "entre" => 0,
                "sortie" => $matiere_premiere->quantite,
                "date" => now(),
                "prixunitaire" => 2000
            ]);
        }
    }
}
