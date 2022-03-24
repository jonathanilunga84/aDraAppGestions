<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id') 
                ->constrained('agents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('projet_id') 
                ->constrained('projets')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('circonstanceConge')->nullable();
            $table->string('totalJourPrevueConge')->nullable();
            $table->string('congeDejaPris')->nullable();
            $table->string('nbrJrD')->nullable();
            $table->string('nbrJourR')->nullable();
            $table->text('explicationConge')->nullable();
            $table->string('dateDepart')->nullable();
            $table->string('dateRetour')->nullable();
            $table->string('statusConge')->nullable();
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
        Schema::table("agents", function (Blueprint $table) {
            $table->dropForeign("agent_id");
        });
        Schema::table("projets", function (Blueprint $table) {
            $table->dropForeign("projet_id");
        });
        Schema::dropIfExists('conges');
    }
}
