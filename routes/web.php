<?php

use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\MatierePremiereController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FormuleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AdministrateurController::class, 'index'])->middleware(['auth'])->middleware(['auth'])->name('dashboard');
Route::get('userlist', [AdministrateurController::class, 'user_list'])->middleware(['auth'])->name('user_list');
Route::get('fiche/{id}', [AdministrateurController::class, 'fiche'])->middleware(['auth'])->name('user_fiche');
Route::post('update/{id}', [AdministrateurController::class, 'update'])->middleware(['auth'])->name('update_status');

Route::get('produit/list', [ProduitController::class, 'index'])->middleware(['auth'])->name('produit_list');
Route::get('produit/stock/etat', [ProduitController::class, 'etat'])->middleware(['auth'])->name('produit_stock_etat');
Route::get('produit/ajout', [ProduitController::class, 'ajout'])->middleware(['auth'])->name('ajout_produit');
Route::post('produit/ajout', [ProduitController::class, 'store'])->middleware(['auth'])->name('store_produit');
Route::get('produit/vente', [ProduitController::class, 'sell'])->middleware(['auth'])->name('vente_produit');
Route::post('produit/vente', [ProduitController::class, 'sell_product'])->middleware(['auth'])->name('sell_produit');

Route::get('formule/list', [FormuleController::class, 'index'])->middleware(['auth'])->name('formule_liste_produit');
Route::get('formule/ajout/{id}', [FormuleController::class, 'ajout'])->middleware(['auth'])->name('ajout_formule');

Route::get('matiere/liste', [MatierePremiereController::class, 'index'])->middleware(['auth'])->name('matiere_list');
Route::get('matiere/ajout', [MatierePremiereController::class, 'ajout'])->middleware(['auth'])->name('ajout_matiere');
Route::get('matiere/stock/etat', [MatierePremiereController::class, 'etat'])->middleware(['auth'])->name('matiere_stock_etat');
Route::get('matiere/achat', [MatierePremiereController::class, 'achat_faire'])->middleware(['auth'])->name('achat_faire');
Route::get('matiere/achat/export', [ExportController::class, 'export'])->middleware(['auth'])->name('export_excel');
Route::post('matiere/ajout', [MatierePremiereController::class, 'store'])->middleware(['auth'])->name('store_stock_matiere');



require __DIR__ . '/auth.php';
