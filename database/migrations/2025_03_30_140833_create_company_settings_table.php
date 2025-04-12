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
        Schema::create('company_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            // $table->foreignId('job_posting_duration_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('status', [1,2,3,4])->default(1)->comment('1 = active, 2 = pending review (case), 3 = inactive , 4 = restricted (banned)');
            $table->tinyInteger('job_posts_visibility')->default(1)->comment('1 visible, 2 hidden');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_settings');
    }
};
