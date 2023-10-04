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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('to');
            $table->integer('from');
            $table->text('content');
            $table->boolean('anonymity');
            $table->timestamp('date');
            $table->integer('replay')->nullable(true);
        });

        // Schema::table('consultations', function (Blueprint $table) {

        //     $table->foreign('to')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
