<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('fingerprints', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('fingerprint_id');
            $table->text('fingerprint_data');
            $table->string('doorlock_id')->nullable();
            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('status', ['Pending', 'Approved', 'Rejected']);
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('fingerprints');
    }
};
