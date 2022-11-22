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
        Schema::create('auteurs_editeurs', function (Blueprint $table) {
            $table->string('auteur_id');
            $table->foreign('auteur_id')
                ->references('id')
                ->on('auteur')->onDelete('cascade');
            $table->string('editeur_id');
            $table->foreign('editeur_id')
                ->references('id')
                ->on('editeur')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auteurs_editeurs');
    }
};
