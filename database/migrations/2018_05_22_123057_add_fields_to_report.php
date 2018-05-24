<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) { 
			$table->string('intervention_type')->nullable();
			$table->string('fluid_amount')->nullable();
			$table->boolean('leak_system')->nullable();
			$table->string('leak_observed')->nullable();
			$table->string('survey')->nullable();
			$table->text('performance')->nullable();
			$table->text('supplies')->nullable();
			$table->text('to_be_done')->nullable();
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
