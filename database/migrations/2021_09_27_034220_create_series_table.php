<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('short_description');
            $table->text('requirements');
            $table->text('course_for');
            $table->text('language');
            $table->text('image');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');

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
        Schema::dropIfExists('series');
    }
}
