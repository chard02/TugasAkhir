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
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // user yang mendaftar sebagai kolaborator
            $table->unsignedBigInteger('project_id'); // proyek yang ingin diikuti
            $table->string('interest_area')->nullable(); // area minat
            $table->text('message')->nullable(); // alasan atau pesan tambahan
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborators');
    }
};
