<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->boolean('is_popular')->default(0)->after('status');
            $table->foreignId('blog_type_id')->nullable()->after('is_popular')->constrained('blog_types')->nullOnDelete();
            $table->text('text_az')->nullable()->after('blog_type_id');
            $table->text('text_en')->nullable()->after('text_az');
            $table->text('text_ru')->nullable()->after('text_en');
            $table->string('slug_az')->nullable()->after('text_ru');
            $table->string('slug_en')->nullable()->after('slug_az');
            $table->string('slug_ru')->nullable()->after('slug_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['blog_type_id']);
            $table->dropColumn([
                'is_popular',
                'blog_type_id',
                'text_az',
                'text_en',
                'text_ru',
                'slug_az',
                'slug_en',
                'slug_ru'
            ]);
        });
    }
};
