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
            $table->text('description');
            $table->string('company_name');
            $table->string('location');
            $table->string('salary_range')->nullable();
            $table->enum('job_type', ['full_time', 'part_time', 'remote', 'contract']);
            $table->enum('work_field', ['it', 'finance', 'marketing', 'hr', 'engineering']);
            $table->enum('qualification', ['bachelor', 'master', 'phd', 'diploma']);
            $table->integer('experience_years');
            $table->enum('gender', ['male', 'female', 'both']);
            $table->enum('language', ['arabic', 'english', 'french', 'german']);
            $table->enum('ad_type', ['job', 'training', 'volunteer']);
            $table->string('country_graduation');
            $table->string('country_residence');
            $table->boolean('is_active')->default(true);
            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
}; 