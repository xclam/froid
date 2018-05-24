<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
			
			// ForeignKey from Customer
			$table->smallInteger('customer_id')
				->nullable()
				->unsigned()
				->references('id')
				->on(config('lecturize.customers.table', 'customers'));
			
			$table->string('civility', 20)->nullable();
			$table->string('firstname', 50)->nullable();
			$table->string('lastname', 50)->nullable();
			$table->string('position', 50)->nullable();
			
			$table->string('phone',    32)->nullable();
            $table->string('mobile',   32)->nullable();
            $table->string('email',    60)->nullable();
			
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
        Schema::dropIfExists('contacts');
    }
}
