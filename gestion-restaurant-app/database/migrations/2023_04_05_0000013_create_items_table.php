<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('id');
            $table->float('prix_item');
            $table->integer('quantite');
            $table->unsignedBigInteger('id_produit');
            //$table->foreign('id_produit')->references('id')->on('produits');
            $table->unsignedBigInteger('id_de_commande');
            $table->foreign('id_de_commande')->references('id')->on('commandes');
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
        Schema::dropIfExists('items');
    }
};
