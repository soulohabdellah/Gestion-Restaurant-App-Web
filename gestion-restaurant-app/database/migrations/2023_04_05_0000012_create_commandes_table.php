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
            $table->id('id');
            $table->date('date_commande');
            $table->float('prix_total');
            $table->string('type', 15);
            $table->unsignedBigInteger('id_client');
            //$table->foreign('id_client')->references('id')->on('clients');
    
            $table->unsignedBigInteger('id_serveur')->nullable();
            //$table->foreign('id_serveur')->references('id')->on('serveurs');
    
            $table->unsignedBigInteger('id_livreur')->nullable();
           // $table->foreign('id_livreur')->references('id')->on('livreurs');
    
            $table->unsignedBigInteger('id_statut');
            //$table->foreign('id_statut')->references('id')->on('statuts');
    
            $table->unsignedBigInteger('id_type');
            //$table->foreign('id_type')->references('id')->on('types');
    
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
