<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Maintenance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fluids', function (Blueprint $table) { 
			$table->integer('fluid_load')->nullable();
		}); 
		Schema::table('reports', function (Blueprint $table) { 
			$table->dropColumn('fluid_load');
		}); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('reports', function (Blueprint $table) { 
			$table->string('fluid_load');
		}); 
    }
}
