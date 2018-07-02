<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sites', function (Blueprint $table) {
        $table->increments('id');

  			// ForeignKey from Customer
  			$table->smallInteger('customer_id')
  				->nullable()
  				->unsigned()
  				->references('id')
  				->on(config('lecturize.customers.table', 'customers'));

  			// ForeignKey from Address
  			$table->smallInteger('address_id')
  				->nullable()
  				->unsigned()
  				->references('id')
  				->on(config('lecturize.addresses.table', 'addresses'));



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
        Schema::dropIfExists('sites');
    }
}
