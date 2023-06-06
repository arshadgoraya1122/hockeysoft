<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
				$table->string('heading',255);
				$table->string('phone',255);
				$table->string('email',255);
				$table->string('logo',255);
				$table->string('ogimage',255);
				$table->string('meta_name',255);
				$table->string('meta_title',255);
				$table->string('meta_description',255);
				$table->string('facebook',255);
				$table->string('twitter',255);
				$table->string('pinterest',255);
				$table->string('linkedin',255);
				$table->string('footer_text',255);
				$table->string('copy_rights',255);
				$table->text('meta_tags');
				$table->text('address');
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
        Schema::dropIfExists('generals');
    }
}
