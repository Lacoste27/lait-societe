<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatStockMatiere extends Model
{
    use HasFactory;

    protected $table = "etat_matiere_stock";

    public function matiere_premieres()
    {
        return $this->hasOne(MatierePremiere::class, 'id',"matiere_premiere_id");
    }
}
