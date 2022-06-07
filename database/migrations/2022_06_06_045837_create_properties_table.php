<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_title');
            $table->string('property_description');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('property_type')->references('id')->on('property_types')->onDelete('cascade');
            $table->decimal('price');
            $table->tinyInteger('status');
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
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
        Schema::dropIfExists('properties');
    }
};
