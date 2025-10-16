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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            // ✅ rendre user_id nullable pour les invités
            $table->foreignId('user_id')
                ->nullable() // <- important
                ->constrained()
                ->onDelete('cascade');

            // ✅ session_id pour les invités
            $table->string('session_id')->nullable()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
