<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->unsigned();
            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->onDelete('restrict')
                ->onUpdate('cascade');


            $table->unsignedBigInteger('seller_id')->unsigned();
            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers')
                ->onDelete('restrict')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('seller_properties');
    }
}
