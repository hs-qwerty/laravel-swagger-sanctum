<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_connections', function (Blueprint $table) {
            $table->id();
            $table->string('photographerId');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('url');
            $table->string('photoId');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('category');
            $table->string('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_connections');
    }
}
