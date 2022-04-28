<?php

use App\Models\Produit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("produit_id");
            $table->float('entre')->default(0);
            $table->float('sortie')->default(0);
            $table->float('prixunitaire');
            $table->date('date');
            $table->foreign("produit_id")->references('id')->on('matiere_premiere');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_stock');
    }
}
