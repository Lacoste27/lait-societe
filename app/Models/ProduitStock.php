<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitStock extends Model
{
    use HasFactory;

    protected $table = 'produit_stock';

    protected $fillable = [
        'produit_id',
        'entre',
        'sortie',
        'date',
        'prixunitaire'
    ];
    public static function getStockInsuffisant($stock_list)
    {
        $retour = [];
        foreach ($stock_list as $stock) {
            if ($stock->etat === 1) {
                $retour[] = $stock;
            }
        }
        // var_dump($retour);
        return $retour;
    }

    public static function getInsuffisantName($stock_list)
    {
        $name = "";
        $stock = ProduitStock::getStockInsuffisant($stock_list);
        foreach ($stock as $stock_name) {
            $matiere_premiere = MatierePremiere::find($stock_name->matiere_premiere_id);
            $name = $name . $matiere_premiere->nom . " ";
        }
        return $name;
    }

    public static function proposition($ingredient_list, $quantite)
    {
        $quantite_min = intval($ingredient_list[0]->reste);
        $proposition = [];
        $quantite_proposer = ($quantite * $quantite_min) / $ingredient_list[0]->quantite;
        foreach ($ingredient_list as $ingredient) {
            $proposition[] = array(
                "produit_id" => $ingredient->produit_id,
                "matiere_premiere_id" => $ingredient->matiere_premiere_id,
                "pourcentage" => $ingredient->pourcentage,
                "quantite" => $ingredient->quantite,
                "quantite_matiere" => ($quantite_proposer * $ingredient->pourcentage) / 100,
            );
        }
        return $proposition;
    }

    public static function quantite_proposer($ingredient_list, $quantite)
    {
        $quantite_min = intval($ingredient_list[0]->reste);
        $proposition = [];
        $quantite_proposer = ($quantite * $quantite_min) / $ingredient_list[0]->quantite;
        return $quantite_proposer;
    }
}
