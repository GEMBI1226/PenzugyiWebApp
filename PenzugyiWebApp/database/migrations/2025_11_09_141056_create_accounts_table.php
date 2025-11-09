<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
        $table->id('account_id');
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        $table->string('name', 100);
        $table->string('type', 50)->nullable();
        $table->decimal('balance', 15, 2)->default(0.00);
        $table->string('currency', 10)->default('HUF');
        $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
