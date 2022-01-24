<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('farmer_id');
            $table->string('ip');
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
            $table->foreign('farmer_id')
                ->references('id')
                ->on('farmers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmer_details');
    }
}
