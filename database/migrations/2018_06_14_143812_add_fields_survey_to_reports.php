<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsSurveyToReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) { 
			$table->boolean('yn_epi')->nullable();
			$table->boolean('yn_outil')->nullable();
			$table->boolean('yn_plan')->nullable();
			$table->boolean('yn_danger')->nullable();
			$table->boolean('yn_risk')->nullable();
			$table->boolean('yn_work_height')->nullable();
			$table->boolean('yn_confined')->nullable();
			$table->boolean('yn_isolated')->nullable();
			$table->boolean('yn_waste')->nullable();
			$table->text('comment_if_needed')->nullable();
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
