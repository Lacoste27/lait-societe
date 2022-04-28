<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AchatFaire extends Model
{
    use HasFactory;

    protected $table = "achat_faire";

    public static function getColumnName()
    {
        $column_name = DB::table('achat_faire')
            ->select('*')
            ->get();
        $data[] = [];
        dd($column_name);
        foreach ($column_name as $column) {
            $data[] = $column->field;
        }
        return $data;
    }
}
