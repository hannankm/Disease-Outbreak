<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('households', function (Blueprint $table) {
            $table->uuid('id')->primary();  
            $table->string('full_name');
            $table->string('house_number');
            $table->string('phone_number');
            $table->string('spouse_name');
            $table->string('spouse_phone_number');
            $table->integer('no_of_adults');
            $table->integer('no_of_children');
            $table->string('location')->nullable();
            $table->uuid('supervisor_id');  
            $table->uuid('woreda_id');  
            $table->timestamps();

            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('woreda_id')->references('id')->on('woredas')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('households');
    }
};
