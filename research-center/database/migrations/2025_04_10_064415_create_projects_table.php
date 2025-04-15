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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('researcher_id'); // penanggung jawab / owner proyek
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('field')->nullable(); // bidang riset (bisa pakai enum nanti)
            $table->enum('status', ['pending', 'active', 'completed'])->default('pending');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();

            // foreign key
            $table->foreign('researcher_id')->references('id')->on('researchers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
