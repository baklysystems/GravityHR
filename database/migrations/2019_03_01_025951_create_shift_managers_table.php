<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_managers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('in_time');
            $table->string('out_time');
            $table->string('type');     // fixed / flexi
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
        Schema::drop('shift_managers');
    }
}
