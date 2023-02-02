<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHbWellnessImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hb_wellness_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wellness_id');

            $table->string('image');

            $table->foreign('wellness_id')->references('id')->on('hb_wellness')->onDelete('cascade');
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
        Schema::dropIfExists('hb_wellness_images');
    }
}
