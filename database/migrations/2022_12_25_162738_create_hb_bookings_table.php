<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHbBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hb_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('staff_id');
            $table->string('checkin_date');
            $table->string('checkout_date');
            $table->string('checkin_time');
            $table->string('checkout_time');
            $table->string('total_adults');
            $table->string('total_childs');
            $table->tinyInteger('booking_status')->default('1')->comment('0=Pending, 1=Booked, 2=Cancel, 3=Payment Pending');
            $table->tinyInteger('is_delete')->default('1')->comment('0=Delete, 1=Not Delete');
            $table->string('payment_mode');
            $table->mediumText('booking_comment')->nullable();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->foreign('guest_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('hb_rooms')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('hb_bookings');
    }
}
