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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 100);
            $table->integer('age');
            $table->enum('gender', ['male', 'female', 'other']); // Opciones predefinidas para género
            $table->string('address');
            $table->string('telephone', 9);
            $table->string('email', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors'); // Asegúrate de que aquí esté 'professors', no 'professor'
    }
};
