<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfilosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfilos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('portfilo_category_id');
            $table->integer('client_id');
            $table->string('title');
            $table->string('slug');
            $table->string('url');
            $table->string('project_date');
            $table->string('excerpt');
            $table->text('description');
            $table->text('image');
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
        Schema::dropIfExists('portfilos');
    }
}
