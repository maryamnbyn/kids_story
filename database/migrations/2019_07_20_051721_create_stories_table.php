<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->string('name');
            $table->string('title');
            $table->string('writer')->nullable();
            $table->string('publisher')->nullable();
            $table->string('designer')->nullable();
            $table->string('talker')->nullable();
            $table->text('abstract')->nullable();
            $table->string('age');
            $table->integer('view_count')->nullable();
            $table->integer('download_count')->nullable();
            $table->string('pic_name')->nullable();
            $table->string('voice_name')->nullable();
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
        Schema::dropIfExists('stories');
    }
}
