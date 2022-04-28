<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatiereStock extends Model
{
    use HasFactory;

    protected $table = 'matiere_stock';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'matiere_premiere_id',
        'entre',
        'sortie',
        'date',
        'prixunitaire'
    ];

    public static function take_off($matiere_premiere_list)
    {
        foreach ($matiere_premiere_list as $matiere_premiere) {
            MatiereStock::create([
                "matiere_premiere_id" => $matiere_premiere->matiere_premiere_id,
                "entre" => 0,
                "sortie" => $matiere_premiere->quantite,
                "date" => now(),
                "prixunitaire" => 2000
            ]);
        }
    }

    public function matiere_premiere() {
        return $this->belongsTo(MatierePremiere::class)->withDefault();
    }
}
