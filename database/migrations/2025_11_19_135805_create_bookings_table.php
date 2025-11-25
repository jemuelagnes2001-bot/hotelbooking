<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('room_id');

        $table->string('name');
        $table->string('contact_number')->nullable();

        $table->date('booking_date');
        $table->time('booking_time');
        $table->string('payment')->nullable();

        $table->enum('status', ['pending', 'approved', 'rejected'])
              ->default('pending');

        $table->timestamps();


        $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        $table->foreign('room_id')->references('id')->on('rooms')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
