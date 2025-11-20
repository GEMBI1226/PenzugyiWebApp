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

            // ACCOUNT FK -> accounts.account_id
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')
                  ->references('account_id')
                  ->on('accounts')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            // CATEGORY FK -> categories.category_id
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                  ->references('category_id')
                  ->on('categories')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();

            $table->decimal('amount', 15, 2);
            $table->enum('type', ['income', 'expense', 'transfer']);
            $table->text('description')->nullable();
            $table->date('date');
            $table->timestamps();
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
