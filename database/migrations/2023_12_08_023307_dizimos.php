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
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->unsignedBigInteger('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->date('data');
            $table->decimal('valor', 8, 2);
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dizimos', function (Blueprint $table) {

            $table->dropForeign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            
        });
    }
};