<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) { 
			$table->string('step')->nullable();
			$table->integer('fluide_vierge')->nullable();
			$table->integer('fluide_recycle')->nullable();
			$table->integer('fluide_regenere')->nullable();
			$table->integer('fluide_traitement')->nullable();
			$table->integer('fluide_conserve')->nullable();
			$table->string('contenant')->nullable();
			$table->boolean('is_leak')->nullable();
			$table->string('fc1')->nullable();
			$table->string('fcr1')->nullable();
			$table->string('fc2')->nullable();
			$table->string('fcr2')->nullable();
			$table->string('fc3')->nullable();
			$table->string('fcr3')->nullable();
			$table->boolean('is_open')->nullable();
			$table->boolean('is_validate')->nullable();
			$table->integer('user_id')->unsigned();
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
