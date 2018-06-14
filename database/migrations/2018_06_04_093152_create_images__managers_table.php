<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesManagersTable extends Migration
{
    /**
     * Run the migrations.
     * @TODO: change for medias table
     * @return void
     */
    public function up()
    {
        Schema::create('images_managers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('image_name')->unique();
			$table->string('image_path');
			$table->string('image_extension', 10);
			$table->string('mobile_image_name')->unique();
			$table->string('mobile_image_path');
			$table->string('mobile_extension', 10);
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
        Schema::dropIfExists('images_managers');
    }
}
