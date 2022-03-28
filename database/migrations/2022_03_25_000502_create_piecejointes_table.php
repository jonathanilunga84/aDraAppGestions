<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiecejointesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piecejointes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id') 
                ->constrained('agents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nomPiecejointe');
            $table->string('documentsAgnet');
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
        Schema::dropIfExists('piecejointes');
    }
}
