<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
	 * @TODO : remove supplies
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
			
			// ForeignKey from Customer
			$table->smallInteger('customer_id')
				->nullable()
				->unsigned()
				->references('id')
				->on(config('lecturize.customers.table', 'customers'));
				
			// ForeignKey from Machine
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
        Schema::dropIfExists('reports');
    }
}
