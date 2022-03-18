<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id(); 
            $table->string('numProjet')->nullable();
            $table->string('nom');
            $table->string('postnom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('sexe');
            $table->string('telephone')->nullable();
            $table->string('lieuNaissance')->nullable();
            $table->string('dateNaissance')->nullable();
            $table->string('etatCivil')->nullable();
            $table->string('email')->nullable();
            $table->string('NumCarteIdentite')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('adresseResidence')->nullable();
            $table->string('NumCompteBancaire')->nullable();
            $table->foreignId('projet_id') 
                ->constrained('projets')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('fonction')->nullable();
            $table->string('lieuAffectation')->nullable();
            $table->string('dateDebut')->nullable();
            $table->string('dateFinPrevue')->nullable();
            $table->string('DateFinEffective')->nullable();
            $table->string('DureeContratMois')->nullable();
            $table->string('DureeContratJour')->nullable();
            $table->string('status')->nullable();
            $table->string('salaires')->nullable();
            $table->foreignId('user_id') 
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignkeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function (Blueprint $table) {
            $table->dropForeign("user_id");
        });
        Schema::table("projets", function (Blueprint $table) {
            $table->dropForeign("projet_id");
        });
        Schema::dropIfExists('agents');
    }
}
