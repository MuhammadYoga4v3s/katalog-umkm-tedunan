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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->foreignId('business_category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('owner_name');
            $table->string('business_name');
            $table->text('business_description')->nullable();

            $table->text('address');
            $table->string('rt', 5);
            $table->string('rw', 3);

            $table->string('google_maps')->nullable();

            $table->string('phone', 20);
            $table->string('email')->nullable();

            $table->string('profile_image')->nullable();

            $table->enum('verification_status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
