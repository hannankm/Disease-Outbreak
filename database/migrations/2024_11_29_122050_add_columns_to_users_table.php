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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('phone_number');
            $table->uuid('region_id')->nullable();  
            $table->uuid('woreda_id')->nullable();  

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('woreda_id')->references('id')->on('woredas')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['phone_number', 'woreda_id', 'region_id']);

        });
    }
};
