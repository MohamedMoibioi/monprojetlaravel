<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('etudiants', function (Blueprint $table) {
            $table->id();

            $table->string('nom',100);
            $table->string('prenom',100);
            $table->string('phone')->unique()->comment(" phone ");
            $table->string('adresse')->unique()->comment(" email ");
            $table->string('profil');

            $table->foreignId('classe_id')->constrained('classes');

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
        Schema::dropIfExists('etudiants');
    }
}
