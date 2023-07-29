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
        Schema::create('candidate_apply_listings', function (Blueprint $table) {
            $table->comment('store candidate jobs application');
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('listing_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email');
            $table->string('phone_number', 15);
            $table->string('personal_url');
            $table->string('resume');
            $table->text('message');
            $table->boolean('status')->default(0);
            $table->timestamps();

            // Add a unique index for email and listing_id
            $table->unique(['email', 'listing_id']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('listing_id')
                ->references('id')
                ->on('listings')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_apply_listings');
    }
};
