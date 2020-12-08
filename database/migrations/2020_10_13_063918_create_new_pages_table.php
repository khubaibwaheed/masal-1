<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('h1')->nullable();
            $table->string('image1')->nullable();
            $table->string('t1')->nullable();
            $table->string('t2')->nullable();
            $table->string('t3')->nullable();
            $table->string('p1')->nullable();
            $table->string('image2')->nullable();
            $table->string('t4')->nullable();
            $table->string('image3')->nullable();
            $table->string('t5')->nullable();
            $table->string('t6')->nullable();
            $table->string('h2')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('image6')->nullable();
            $table->string('image7')->nullable();
            $table->string('h3')->nullable();
            $table->string('i1')->nullable();
            $table->string('t7')->nullable();
            $table->string('p2')->nullable();
            $table->string('i2')->nullable();
            $table->string('t8')->nullable();
            $table->string('p3')->nullable();
            $table->string('i3')->nullable();
            $table->string('t9')->nullable();
            $table->string('p4')->nullable();
            $table->string('i4')->nullable();
            $table->string('t10')->nullable();
            $table->string('p5')->nullable();
            $table->string('image8')->nullable();
            $table->string('t11')->nullable();
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
        Schema::dropIfExists('new_pages');
    }
}
