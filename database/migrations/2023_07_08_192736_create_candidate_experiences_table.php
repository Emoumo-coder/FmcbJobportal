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
        Schema::create('candidate_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_profile_id');
            $table->string('title', 100);
            $table->string('company', 100);
            $table->string('period', 20);
            $table->string('description');
            $table->timestamps();

            $table->foreign('candidate_profile_id')
                ->references('id')
                ->on('candidate_profiles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_experiences');
    }
};
