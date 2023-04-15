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
        Schema::create('serveurs', function (Blueprint $table) {

            $table->id('id');
            $table->string('nom',15);
            $table->string('prenom',15);
            $table->string('email',25)->unique();
            $table->string('password',100);
            $table->string('CIN',25);
            $table->string('telephone',25);
            $table->date('date_recrutement');
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
        Schema::dropIfExists('serveurs');
    }
};
