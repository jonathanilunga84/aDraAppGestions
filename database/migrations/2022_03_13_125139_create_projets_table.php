<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('numeroProjet')->nullable();
            $table->string('intituleProjet');
            $table->string('dateProjet');
            $table->string('dateFinProjet');
            $table->string('lieuProjet');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('projets');
    }
}
