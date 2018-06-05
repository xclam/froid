<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 100)->nullable();
			$table->string('siret', 14)->nullable();
			
			// ForeignKey from Address
			$table->smallInteger('address_id')
				->nullable()
				->unsigned()
				->references('id')
				->on(config('lecturize.addresses.table', 'addresses'));
				
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
        Schema::dropIfExists('companies');
    }
}
