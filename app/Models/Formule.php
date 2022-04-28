<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Formule extends Model
{
    use HasFactory;

    public static function getQuantite($quantite, $produit_id)
    {
        $matiere_quantite = DB::select('SELECT f.produit_id, f.matiere_premiere_id , f.pourcentage , ('.$quantite.' * f.pourcentage) / 100 as quantite, ms.reste ,CASE WHEN (('.$quantite.' * f.pourcentage) / 100) > ms.reste THEN 1 ELSE 0 END AS etat from formule f join etat_matiere_stock ms on f.matiere_premiere_id = ms.matiere_premiere_id where f.produit_id = '.$produit_id.' and compteur = (SELECT max(compteur) FROM formule where produit_id = '.$produit_id.') order by ms.reste asc');
        return $matiere_quantite;
    }

    public static function getFormuleByProductId($id) {
        $formule = DB::table("formule")->where("produit_id","=",$id)->get();
        return $formule;
    }

    public static function getFormule($produit_id) {
        $formule = DB::select('SELECT f.produit_id, f.matiere_premiere_id , f.pourcentage  from formule f  where f.produit_id = '.$produit_id.' and compteur = (SELECT max(compteur) FROM formule where produit_id = '.$produit_id.')');
        return $formule;
    }
 
}
