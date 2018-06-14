<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) { 
			$table->string('detector')->nullable();
			$table->string('other')->nullable();
			$table->string('technician_observations')->nullable();
			$table->string('customer_observations')->nullable();
			$table->boolean('on_call_duty')->nullable();
			$table->time('atam')->nullable();
			$table->time('dtam')->nullable();
			$table->time('atpm')->nullable();
			$table->time('dtpm')->nullable();
			$table->time('atnty')->nullable();
			$table->time('dtnty')->nullable();
			$table->time('total_time')->nullable();
			$table->time('travel_time')->nullable();
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
