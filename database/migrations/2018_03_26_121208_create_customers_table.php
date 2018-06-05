<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('name', 100)->nullable();
			$table->string('firstname', 50)->nullable();
			$table->string('lastname', 50)->nullable();
			
			$table->boolean('is_society')->default(1);
			$table->boolean('is_active')->default(1);
			$table->string('siret', 14)->nullable();
			
			// ForeignKey from Address
			$table->smallInteger('address_id')
				->nullable()
				->unsigned()
				->references('id')
				->on(config('lecturize.addresses.table', 'addresses'));
				
			// ForeignKey from Image
			$table->smallInteger('image_id')
				->nullable()
				->unsigned()
				->references('id')
				->on(config('lecturize.images_managers.table', 'images_managers'));
			
			$table->string('phone',    32)->nullable();
            $table->string('mobile',   32)->nullable();
            $table->string('fax',      32)->nullable();
            $table->string('email',    60)->nullable();
            $table->string('website', 100)->nullable();

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
        Schema::dropIfExists('customers');
    }
}
