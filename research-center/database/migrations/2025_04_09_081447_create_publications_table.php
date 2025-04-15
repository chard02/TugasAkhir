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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('researcher_id')->nullable(); // opsional, bisa null jika data belum dikaitkan
            $table->string('title');
            $table->text('abstract')->nullable();
            $table->string('journal')->nullable();
            $table->string('doi')->nullable();
            $table->string('publication_date')->nullable();
            $table->string('source')->nullable(); // orcid, scopus, garuda
            $table->string('external_id')->nullable(); // ID dari sumber asli (misal: scopusId, orcidWorkId, dll)
            $table->json('authors')->nullable(); // bisa jadi array
            $table->text('raw_data')->nullable(); // opsional, menyimpan response mentah (json)
            $table->timestamps();
        
            $table->foreign('researcher_id')->references('id')->on('researchers')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
