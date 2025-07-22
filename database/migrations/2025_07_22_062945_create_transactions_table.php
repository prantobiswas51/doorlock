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
            $table->unsignedInteger('fingerprint_id');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('transaction_type');
            $table->string('doorlock_id')->nullable();

            $table->text('fingerprint_data')->nullable();
            $table->text('image_data')->nullable();
            $table->text('opened_at')->nullable();
            $table->text('closed_at')->nullable();
            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('status', ['Pending', 'Approved', 'Disapproved', 'Incorrect Password', 'Correct Password', 'Undected Face', 'User Abort']);
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
