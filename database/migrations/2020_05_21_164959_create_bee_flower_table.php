<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeeFlowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bee_flower', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flower_id');
            $table->foreign('flower_id')->references('id')->on('flowers');
            $table->unsignedBigInteger('bee_id');
            $table->foreign('bee_id')->references('id')->on('bees');
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
        Schema::dropIfExists('bees_flowers');
    }
}
