<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Administrateur extends Model
{
    use HasFactory;

    public static function getAllNormalUser()
    {
        $user_list = DB::table('users')
            ->where('isValid', '=', 0)
            ->where('role', '=', 'normal')
            ->get();
        return $user_list;
    }
}
