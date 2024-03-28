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
        Schema::create('radiographies', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->index();
            $table->integer('dental_id')->index()->nullable();
            $table->string('photo');
            $table->string('date', 15)->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radiographies');
    }
};
