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
        Schema::table('news', function (Blueprint $table) {
            $table->text('resume')->nullable();
            $table->text('header')->nullable();
            $table->text('section_1')->nullable();
            $table->text('section_2')->nullable();
            $table->string('second_image')->nullable();
            $table->text('conclusion')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('resume');
            $table->dropColumn('header');
            $table->dropColumn('section_1');
            $table->dropColumn('section_2');
            $table->dropColumn('second_image');
            $table->dropColumn('conclusion');
        });
    }
};
