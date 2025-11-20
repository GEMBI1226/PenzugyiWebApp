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
<<<<<<< HEAD:PenzugyiWebApp/PenzugyiWebApp/database/migrations/2025_11_08_190656_create_transactions_table.php
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
=======
        // Létrehozzuk a 'transactions' táblát
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // Elsődleges kulcs, automatikusan növekvő szám
            $table->string('title'); // Tranzakció neve vagy leírása
            $table->decimal('amount', 10, 2); // Tranzakció összege, max 10 számjegy, 2 tizedes
            $table->enum('type', ['income', 'expense']); // Tranzakció típusa: bevétel vagy kiadás
            $table->timestamps(); // Létrehozza a 'created_at' és 'updated_at' oszlopokat
>>>>>>> f93ccf72466678c964352a4dfea2f71039fddb26:PenzugyiWebApp/database/migrations/2025_11_08_190656_create_transactions_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD:PenzugyiWebApp/PenzugyiWebApp/database/migrations/2025_11_08_190656_create_transactions_table.php
=======
        // Ha vissza akarjuk vonni a migrációt, töröljük a 'transactions' táblát
>>>>>>> f93ccf72466678c964352a4dfea2f71039fddb26:PenzugyiWebApp/database/migrations/2025_11_08_190656_create_transactions_table.php
        Schema::dropIfExists('transactions');
    }
};

<<<<<<< HEAD:PenzugyiWebApp/PenzugyiWebApp/database/migrations/2025_11_08_190656_create_transactions_table.php

=======
>>>>>>> f93ccf72466678c964352a4dfea2f71039fddb26:PenzugyiWebApp/database/migrations/2025_11_08_190656_create_transactions_table.php
