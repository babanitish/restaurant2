<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutritionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutritions', function (Blueprint $table) {
            $table->id();
            $table->double('energy')->nullable();
            $table->double('fat')->nullable();
            $table->double('proteines')->nullable();
            $table->double('glucides')->nullable();
            $table->double('sel')->nullable();
            $table->foreignId('product_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutritions');
    }
}
