<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_sections', function (Blueprint $table) {
            $table->id();
				$table->string('url',255);
				$table->string('meta_title',255);
				$table->text('meta_description');
				$table->string('button_text',255);
				$table->string('button_url',255);
				$table->string('logo1',255);
				$table->string('logo2',255);
				$table->string('background_image',255);
				$table->string('title',255);
				$table->text('description');
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
        Schema::dropIfExists('slider_sections');
    }
}
