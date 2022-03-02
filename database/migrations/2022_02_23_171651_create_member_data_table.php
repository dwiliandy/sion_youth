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
        Schema::create('member_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->date('birth_date');
            $table->string('unique_number')->unique();
            $table->string('birth_place');
            $table->boolean('baptize');
            $table->boolean('is_active');
            $table->boolean('sidi');
            $table->string('group');
            $table->string('family_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_data');
    }
};
