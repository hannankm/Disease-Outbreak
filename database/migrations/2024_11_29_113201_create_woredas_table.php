
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWoredasTable extends Migration
{
    public function up()
    {
        Schema::create('woredas', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Use UUID for id
            $table->string('name');
            $table->uuid('zone_id'); // Use UUID for the foreign key
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('woredas');
    }
}
