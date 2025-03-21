<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\BlogType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blog_types', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('text');
        });
        
        // Var olan kayıtlara slug ekleme
        $blogTypes = BlogType::all();
        foreach ($blogTypes as $blogType) {
            $blogType->slug = Str::slug($blogType->text);
            $blogType->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_types', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
