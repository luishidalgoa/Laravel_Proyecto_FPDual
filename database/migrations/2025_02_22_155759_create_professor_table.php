<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear las migraciones.
     */
    public function up(): void
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');  // Relación con users
            $table->string('fullname', 100);
            $table->integer('age');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('address', 150);
            $table->string('telephone', 9);
            $table->string('email', 50)->unique();
            $table->timestamps();
            
            // Eliminamos la columna password ya que usaremos la de users
        });
    }

    /**
     * Rollback de las migraciones.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('professors');
        Schema::enableForeignKeyConstraints();
    }
};