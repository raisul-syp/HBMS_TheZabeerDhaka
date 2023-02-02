<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHbRestaurentImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hb_restaurent_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurent_id');

            $table->string('image');

            $table->foreign('restaurent_id')->references('id')->on('hb_restaurents')->onDelete('cascade');
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
        Schema::dropIfExists('hb_restaurent_images');
    }
}
