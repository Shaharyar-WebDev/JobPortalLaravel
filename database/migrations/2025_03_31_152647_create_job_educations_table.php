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
        Schema::create('job_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_post_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('educations_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_educations');
    }
};
