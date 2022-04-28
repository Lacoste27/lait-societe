<?php

use App\Models\MatierePremiere;
use App\Models\Produit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formule', function (Blueprint $table) {
            $table->id("id");
            $table->foreignIdFor(Produit::class,"produit_id");
            $table->foreignIdFor(MatierePremiere::class,"matiere_premiere_id");
            $table->integer("pourcentage");
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
        Schema::dropIfExists('formule');
    }
}
