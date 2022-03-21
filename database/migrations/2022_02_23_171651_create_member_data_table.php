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
            $table->string('birth_place');
            $table->boolean('is_active')->default(true);
            $table->string('group');
            $table->string('family_name');
            $table->enum('baptize', ['already','not_yet']);
            $table->enum('sidi', ['already','not_yet']);
            $table->enum('sex', ['male','female']);
            $table->string('id_number')->nullable();
            
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
