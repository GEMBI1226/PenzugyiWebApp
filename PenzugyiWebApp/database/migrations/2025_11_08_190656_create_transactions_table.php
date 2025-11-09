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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id'); // Elsődleges kulcs
            $table->foreignId('account_id')
                  ->constrained('accounts')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate(); // FK → accounts.account_id
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->nullOnDelete()
                  ->cascadeOnUpdate(); // FK → categories.category_id
            $table->decimal('amount', 15, 2); // Összeg
            $table->enum('type', ['income', 'expense', 'transfer']); // Tranzakció típusa
            $table->text('description')->nullable(); // Megjegyzés
            $table->date('date'); // Tranzakció dátuma
            $table->timestamps(); // created_at és updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};


