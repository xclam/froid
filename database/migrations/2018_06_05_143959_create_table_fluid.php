<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFluid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('fluids', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 100)->nullable();
			
			// ForeignKey from Address
			$table->smallInteger('machine_id')
				->nullable()
				->unsigned()
				->references('id')
				->on(config('lecturize.machines.table', 'machines'));
			
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
        //
    }
}
