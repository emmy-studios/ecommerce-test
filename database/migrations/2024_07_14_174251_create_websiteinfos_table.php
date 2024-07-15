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
        Schema::create('websiteinfos', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('main_mail')->nullable();
            $table->string('second_mail')->nullable();
            $table->string('main_logo')->nullable();
            $table->string('admin_panel_logo')->nullable();
            $table->string('signup_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websiteinfos');
    }
};
