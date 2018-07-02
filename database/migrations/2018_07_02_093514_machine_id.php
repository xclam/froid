<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MachineId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('reports', function (Blueprint $table) {
          $table->smallInteger('machine_id')
            ->onDelete('restrict')
            ->change();
      });

      Schema::table('fluid_machine', function (Blueprint $table) {
          $table->smallInteger('machine_id')
            ->onDelete('restrict')
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
