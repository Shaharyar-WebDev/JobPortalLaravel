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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('image', 255)->nullable();
            $table->foreignId('industry_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_industry_id')->constrained()->onDelete('cascade');
            $table->enum('company_size', ['1-50', '51-500', '500+'])->nullable();
            $table->bigInteger('valuation')->nullable();
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_area_id')->constrained()->onDelete('cascade');
            $table->string('address', 255);
            $table->string('website', 255)->nullable();
            $table->enum('job_posts_visibility', ['hidden', 'visible'])->default('visible');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
