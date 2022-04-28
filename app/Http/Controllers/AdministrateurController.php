<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Administrateur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdministrateurController extends Controller
{
    //
    public function index()
    {
        return view('dashboard');
    }
    
    public function user_list()
    {
        $user_list = Administrateur::getAllNormalUser();
        return view('pages.user_list', ["user_list" => $user_list]);
    }

    public function fiche($id)
    {
        $user = User::find($id);
        return view('pages.fiche_user', ["user" => $user]);
    }

    public function update($id)
    {
        $user = User::find($id);
        $user->update([
            'isValid' => 1,
        ]);
        Mail::to($user->email)->bcc($user->email)
            ->queue(new SendMail());
        return redirect(route('user_list'));
    }
}
