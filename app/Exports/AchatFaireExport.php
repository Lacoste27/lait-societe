<?php

namespace App\Exports;

use App\Models\AchatFaire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AchatFaireExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return AchatFaire::all();
    }

    public function headings(): array
    {
        return ["Id", "Entrée", "Sortie", "Reste", "Seuill Stock","Nom"];
    }
}
