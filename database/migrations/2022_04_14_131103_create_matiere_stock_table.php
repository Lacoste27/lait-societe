<?php

use App\Models\MatierePremiere;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatiereStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("matiere_premiere_id");
            $table->float('entre')->default(0);
            $table->float('sortie')->default(0);
            $table->float('prixunitaire');
            $table->date('date');
            $table->timestamps();
            $table->foreign("matiere_premiere_id")->references('id')->on('matiere_premiere');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matiere_stock');
    }
}
