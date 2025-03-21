<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTypesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_types', function (Blueprint $table) {
            $table->id();
            $table->string('text'); // Blog türü için metin
            $table->boolean('status')->default(1); // Aktif/Deaktif durumu
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_types');
    }
} 