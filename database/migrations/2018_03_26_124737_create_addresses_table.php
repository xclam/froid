<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
			$table->string('street', 100)->nullable();
			$table->string('street_extra', 100)->nullable();
			$table->boolean('is_active');
			
			$table->string('city',      60)->nullable();
            $table->string('state',     60)->nullable();
            $table->string('post_code', 10)->nullable();

            $table->integer('country_id')->nullable()->unsigned()->index();

            $table->string('note')->nullable();

            $table->float('lat', 10, 6)->nullable();
            $table->float('lng', 10, 6)->nullable();

            $table->nullableMorphs('addressable');

            foreach(config('lecturize.addresses.flags', ['public', 'primary', 'billing', 'shipping']) as $flag) {
                $table->boolean('is_'. $flag)->default(false)->index();
            }

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
