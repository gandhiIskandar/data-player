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
            $table->id();
            $table->foreignId('type_id')->index();
            $table->foreignId('member_id');
            $table->unsignedBigInteger('from_account')->nullable();
            $table->unsignedBigInteger('to_account')->nullable();
            $table->foreignId('website_id');
            $table->boolean('new');
            $table->integer('amount');
            $table->timestamps();


             // Menambahkan foreign key constraints
             $table->foreign('from_account')->references('id')->on('accounts')->onDelete('set null');
             $table->foreign('to_account')->references('id')->on('accounts')->onDelete('set null');
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
