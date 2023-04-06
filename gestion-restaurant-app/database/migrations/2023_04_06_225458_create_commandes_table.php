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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('id_commande');
            $table->date('date_commande');
            $table->float('prix_total');
            $table->string('type', 15);
            $table->unsignedBigInteger('id_client');
            
    
            $table->unsignedBigInteger('id_serveur')->nullable();
            $table->foreign('id_serveur')->references('id_serveur')->on('serveurs');
    
            $table->unsignedBigInteger('id_livreur')->nullable();
            $table->foreign('id_livreur')->references('id_livreur')->on('livreurs');
    
            $table->unsignedBigInteger('id_statut');
            $table->foreign('id_statut')->references('id_statut')->on('statuts');
    
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
        Schema::dropIfExists('commandes');
    }
};
