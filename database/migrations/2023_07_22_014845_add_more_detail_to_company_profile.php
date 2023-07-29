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
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->text('overview', 1000)->nullable()->after('linkedin_link');
            $table->string('youtube_link')->nullable()->after('linkedin_link');
            $table->text('youtube_link_description', 640)->nullable()->after('linkedin_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn(['overview', 'youtube_link', 'youtube_link_description']);
        });
    }
};
