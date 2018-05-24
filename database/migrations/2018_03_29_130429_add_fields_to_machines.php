<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToMachines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('machines', function (Blueprint $table) { 
			$table->boolean('is_active')->nullable();
			$table->string('brand',50)->nullable();
			$table->string('model',50)->nullable();

			$table->string('serial_number',60)->nullable();
			$table->string('name',50)->nullable();
			$table->string('nfc',50)->nullable();
			$table->string('internal_number',60)->nullable();
			$table->string('city',60)->nullable();
			
			$table->dateTime('manufacturing_date')->nullable();
			$table->dateTime('purchase_date')->nullable();
			$table->dateTime('start_date')->nullable();
			$table->text('notes')->nullable();
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
