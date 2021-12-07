<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
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
            $table->enum('types', ['rent', 'sale', 'buy'])->default('buy');
            $table->string('country');
            $table->string('state_name');
            $table->string('city_name');
            $table->string('zip_code');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('price')->default(0);
            $table->date('build_date');
            $table->integer('bedrooms')->default(1);
            $table->integer('garages')->default(1);
            $table->integer('bathrooms')->default(1);
            $table->integer('area')->default(0);
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_slider')->default(0);
            $table->boolean('is_verify')->default(0);
            $table->string('state_id_card')->nullable();
            $table->string("tax_payment_document")->nullable();
            $table->integer('page_visit')->default(1);
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
}
