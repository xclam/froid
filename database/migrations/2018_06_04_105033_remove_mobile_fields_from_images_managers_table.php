<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveMobileFieldsFromImagesManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images_managers', function (Blueprint $table) { 
			$table->dropColumn('mobile_image_name');
			$table->dropColumn('mobile_image_path');
			$table->dropColumn('mobile_extension');
		}); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images_managers', function (Blueprint $table) { 
			$table->string('mobile_image_name');
			$table->string('mobile_image_path');
			$table->string('mobile_extension');
		}); 
    }
}
