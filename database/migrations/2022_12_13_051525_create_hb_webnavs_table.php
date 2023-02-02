<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHbWebnavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hb_webnavs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('display_order')->nullable();

            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->mediumText('meta_decription')->nullable();

            $table->tinyInteger('is_active')->default('1')->comment('0=Deactive, 1=Active');
            $table->tinyInteger('is_delete')->default('1')->comment('0=Delete, 1=Not Delete');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('hb_webnavs');
    }
}
