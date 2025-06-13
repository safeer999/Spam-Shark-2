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
        Schema::create('bulk_verifications', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('task_name'); 
            $table->string('original_file_name'); 
            $table->string('stored_file_path'); 
            $table->string('result_file_path')->nullable(); // Path to where the results will be stored
            $table->enum('status', ['pending', 'processing', 'completed', 'failed'])->default('pending');
            $table->integer('progress')->default(0); 
            $table->integer('total_emails')->default(0); // Total emails in the file
            $table->json('summary_counts')->nullable(); 
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulk_verifications');
    }
};
