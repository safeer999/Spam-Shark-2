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
        Schema::create('bulk_verification_results', function (Blueprint $table) {
            $table->id();
            
             $table->foreignId('bulk_verification_task_id')->constrained()->onDelete('cascade'); // Links to the bulk task

               $table->string('email');
             $table->string('overall_status');         // e.g., "Safe", "Invalid", "Disposable", etc.

             $table->string('syntax');                 // Valid / Invalid
             $table->string('role_based')->nullable(); // Yes / No / null
             $table->string('catch_all')->nullable();              // Yes / No
             $table->string('disposable')->nullable(); // Yes / No / null
             $table->string('spam_trap')->nullable();  // Yes / No / null
             $table->string('smtp');                   // Success / Failed / Timeout
             $table->string('ssl');                    // Secure / Insecure
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulk_verification_results');
    }
};
