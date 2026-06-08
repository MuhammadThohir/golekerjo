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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('company');
            $table->string('logo')->nullable();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnUpdate();

            $table->string('education');
            $table->string('experience');

            $table->enum('gender', [
                'male',
                'female',
                'all'
            ])->default('all');

            $table->string('location');
            $table->text('address')->nullable();

            $table->bigInteger('salary_min')->nullable();
            $table->bigInteger('salary_max')->nullable();

            $table->longText('description');
            $table->longText('requirements');

            $table->string('contact_email');
            $table->string('contact_phone')->nullable();

            $table->boolean('is_premium')
                ->default(false);

            $table->boolean('status')
                ->default(true);

            $table->date('expired_at')
                ->nullable();

            $table->unsignedBigInteger('views')
                ->default(0);

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
