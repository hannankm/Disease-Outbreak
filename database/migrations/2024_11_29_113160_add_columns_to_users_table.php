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

            // $table->dropPrimary();

            // // Drop the existing auto-increment column 'id'
            // $table->dropColumn('id');

            // // Add the 'id' as UUID and set it as primary key
            // $table->uuid('id')->primary()->first(); // Set 'id' as primary key

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
             $table->dropForeign(['region_id']);
            $table->dropForeign(['woreda_id']);
            $table->dropColumn(['phone_number', 'woreda_id', 'region_id']);

            // Convert 'id' column back to auto-increment integer and primary key
            // $table->dropPrimary();
            // $table->bigIncrements('id')->first(); 

        });
    }
};
