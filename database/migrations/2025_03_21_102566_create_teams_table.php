<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('image_path');
            $table->string('position_az');
            $table->string('position_en');
            $table->string('position_ru');
            $table->boolean('status')->default(true);
            $table->timestamps();



        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
}; 