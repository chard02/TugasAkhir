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
        Schema::create('organization_structures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position_title');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
        
            // Foreign key parent_id ke dirinya sendiri
            $table->foreign('parent_id')->references('id')->on('organization_structures')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structure__organizations');
    }
};
