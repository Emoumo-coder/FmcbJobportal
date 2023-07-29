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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('department');
            $table->longText('description');
            $table->string('employment_type');
            $table->string('job_level');
            $table->string('job_experience');
            $table->decimal('salary', $precision = 8, $scale = 2);
            $table->string('phone');
            $table->string('email');
            $table->string('job_photo')
                ->nullable();
            $table->boolean('status')
                ->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
