<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('publications', function (Blueprint $table) {
        $table->string('type')->nullable(); // jurnal, prosiding, dll.
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            //
        });
    }
};
