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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->integer('entry_number')->nullable();
            $table->unsignedBigInteger('tournament_id')->nullable();
            $table->foreign('tournament_id')
                ->references('id')
                ->on('tournaments')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->unsignedBigInteger('selected_fish_id_1')->nullable();
            $table->foreign('selected_fish_id_1')
                ->references('id')
                ->on('fish')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->unsignedBigInteger('selected_fish_id_2')->nullable();
            $table->foreign('selected_fish_id_2')
                ->references('id')
                ->on('fish')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->string('name');
            $table->string('email');
            $table->string('tel');
            $table->boolean('is_join_fellowship');
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
        Schema::dropIfExists('entries');
    }
};
