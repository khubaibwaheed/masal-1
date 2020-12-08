<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumIcone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_pages', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_pages', function (Blueprint $table) {
            $table->string('i1')->after('h3');
            $table->string('i2')->after('t7');
            $table->string('i3')->after('p2');
            $table->string('i4')->after('t8');
        });
    }
}
