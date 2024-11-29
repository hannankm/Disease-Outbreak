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
        Schema::create('household_stats', function (Blueprint $table) {
            $table->uuid('id')->primary();  
            $table->integer('no_of_active_cases');
            $table->integer('no_of_death');
            $table->integer('no_of_people_at_risk');
            $table->integer('no_of_recovered');
            $table->date('date');
            $table->uuid('household_id'); 
            $table->foreignId('supervisor_id')->constrained('users')->onDelete('cascade'); // Foreign key for supervisor_id
            $table->timestamps();

            $table->foreign('household_id')->references('id')->on('households')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('household_stats');
    }
};
