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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('fName');
            $table->string('lName');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('age');
            $table->foreignId('gender_id')->nullable();
            $table->string('biography');
            $table->string('facebook');
            $table->string('tweeter');
            $table->string('linkedin');
            $table->string('instagram');
            $table->string('DoB');
            $table->foreignId('properties_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
