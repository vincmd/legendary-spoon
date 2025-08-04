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
        // Schema::create('que', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('phone_number');
        //     $table->string('first_letter');
        //     $table->string('plate_number');
        //     $table->string('last_plate_letter');
        //     $table->bigInteger('que_number');
        //     $table->string('call_status')->nullable();
        //     $table->tinyInteger('is_called')->default(0);
        //     $table->enum('status', ['skiped', 'called', 'next', 'done']);
        //     $table->date('dates');

        //     $table->unsignedBigInteger('locket_id')->unique()->nullable();
        //     $table->unsignedBigInteger('layanan_id')->unique()->nullable();
        //     $table->unsignedBigInteger('level_id')->unique()->nullable();

        //     // Foreign keys
        //     $table->foreign('layanan_id')->references('id')->on('layanan')->onDelete('cascade');
        //     $table->foreign('locket_id')->references('locket_id')->on('locketservices')->onDelete('cascade');
        //     $table->foreign('level_id')->references('id')->on('level')->onDelete('cascade');


        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('que');
    }
};
