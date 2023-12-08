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
        Schema::create('dizimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('usuarios');
            $table->date('data');
            $table->string('valor');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('dizimo', function (Blueprint $table) {

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
        });
    }
};