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
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('title', 255);
            $table->text('description');
            $table->enum('job_setting', ['onsite', 'remote','hybrid'])->comment('1 = onsite, 2 = remote, 3 = hybrid');
            $table->foreignId('city_id')->constrained();
            $table->foreignId('city_area_id')->constrained();
            $table->string('address',255);
            $table->foreignId('industry_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_industry_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_type_id')->constrained();
            $table->foreignId('job_experience_id')->constrained();
            $table->json('custom_educations')->nullable();
            $table->json('custom_skills')->nullable();
            $table->unsignedBigInteger('min_salary');
            $table->unsignedBigInteger('max_salary');
            $table->integer('job_post_duration')->default(30)->comment('in days');
            $table->boolean('urgently_hiring')->nullable()->default(0)->comment('1 true, 2 false');
            $table->date('apply_before');
            $table->tinyInteger('visibility')->default(1)->comment('1 visible, 2 hidden');
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
