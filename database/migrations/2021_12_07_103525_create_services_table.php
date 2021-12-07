<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->date('date')->nullable();;
            $table->boolean('status')->default(0);
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('page_visit')->default(1);
            $table->unsignedBigInteger('posted_by')->unsigned();
            $table->unsignedBigInteger('service_type_id')->unsigned();
            $table->foreign('posted_by')->references('id')
                ->on('super_admins')->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('service_type_id')
                ->references('id')->on('service_types')
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
        Schema::dropIfExists('services');
    }
}
