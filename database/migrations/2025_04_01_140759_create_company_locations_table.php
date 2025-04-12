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
        // Schema::create('company_locations', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('company_id')->constrained()->onDelete('cascade');
        //     $table->foreignId('city_id')->constrained()->onDelete('cascade');
        //     $table->foreignId('city_area_id')->constrained()->onDelete('cascade');   
        //     $table->string('address', 255);
        //     $table->string('branch_name', 100)->default('Main Branch');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_locations');
    }
};
