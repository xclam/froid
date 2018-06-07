<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFluidMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fluid_machine', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('machine_id')->unsigned();
			$table->integer('fluid_id')->unsigned();
			$table->integer('fluid_load')->unsigned();
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
        Schema::dropIfExists('fluid_machine');
    }
}
