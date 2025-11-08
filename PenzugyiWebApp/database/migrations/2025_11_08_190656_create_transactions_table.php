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
        // Létrehozzuk a 'transactions' táblát
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // Elsődleges kulcs, automatikusan növekvő szám
            $table->string('title'); // Tranzakció neve vagy leírása
            $table->decimal('amount', 10, 2); // Tranzakció összege, max 10 számjegy, 2 tizedes
            $table->enum('type', ['income', 'expense']); // Tranzakció típusa: bevétel vagy kiadás
            $table->timestamps(); // Létrehozza a 'created_at' és 'updated_at' oszlopokat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ha vissza akarjuk vonni a migrációt, töröljük a 'transactions' táblát
        Schema::dropIfExists('transactions');
    }
};

