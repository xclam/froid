<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
			
			// ForeignKey from Customer
			$table->smallInteger('customer_id')
				->nullable()
				->unsigned()
				->references('id')
				->on(config('lecturize.customers.table', 'customers'));
				
			// ForeignKey from Customer
			// $table->smallInteger('site_id')
				// ->nullable()
				// ->unsigned()
				// ->references('id')
				// ->on(config('lecturize.sites.table', 'sites'));
				
			
			

			
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
        Schema::dropIfExists('machines');
    }
}
