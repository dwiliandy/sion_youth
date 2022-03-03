<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('author')->nullable();
        $table->text('excerpt');
        $table->boolean('published')->default(false);
        $table->datetime('published_at')->nullable(true);
        $table->text('body');
        $table->string('image')->nullable();
        $table->timestamps();
        $table->unsignedBigInteger('category_id');
        $table->foreign('category_id')->references('id')->on('categories');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
