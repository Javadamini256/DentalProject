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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('regNumber');
            $table->string('name',30);
            $table->string('lastName',30);
            $table->string('fatherName',30)->nullable();
            $table->integer('doctor_id')->nullable();
            $table->string('image')->nullable();
            $table->string('phone',10)->nullable();
            $table->tinyInteger('age')->nullable();
            $table->string('IDNumber',10)->nullable();
            $table->string('bloodType',10)->nullable();
            $table->boolean('marriage')->nullable();
            $table->boolean('pregnant')->nullable();
            $table->string('education',30)->nullable();
            $table->boolean('gender')->nullable();
            $table->string('address',80)->nullable();
            $table->string('surgeryHistory')->nullable();
            $table->integer('systemic_id')->index()->nullable();
            $table->string('systemicDisease_description')->nullable();
            $table->boolean('status')->default('1')->nullable();
            $table->string('registrationDate',15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
