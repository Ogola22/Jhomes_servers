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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->string('title');
            $table->string('location');
            $table->string('desc');
            $table->string('price');
            $table->string('bedroom');
            $table->string('bathroom');
            $table->string('size');
            $table->string('type');
            $table->string('garage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
