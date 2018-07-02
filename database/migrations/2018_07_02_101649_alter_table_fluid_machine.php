<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableFluidMachine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('fluid_machine', function (Blueprint $table) {
        $table->smallInteger('machine_id')
          ->onDelete('cascade')
          ->change();
        $table->smallInteger('fluid_id')
          ->onDelete('cascade')
          ->change();
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
