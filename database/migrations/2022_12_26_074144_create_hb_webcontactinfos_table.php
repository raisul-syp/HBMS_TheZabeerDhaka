<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHbWebcontactinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hb_webcontactinfos', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('google_map')->nullable();
            $table->string('phone_sales')->nullable();
            $table->string('phone_reservation')->nullable();
            $table->string('email_sales')->nullable();
            $table->string('email_reservation')->nullable();
            $table->string('display_order')->nullable();
            
            $table->string('meta_title');
            $table->longText('meta_keyword');
            $table->longText('meta_decription')->nullable();

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
        Schema::dropIfExists('hb_webcontactinfos');
    }
}
