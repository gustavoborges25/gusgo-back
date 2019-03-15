<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('state_id');
            $table->integer('ibge_id');
            $table->string('name');

            $table->timestamps();
            $table->softDeletes();

            $table->primary('id');

            $table
                ->foreign('state_id')
                ->references('id')->on('states')->onDelete('cascade');

            $table->unique(['state_id', 'ibge_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
