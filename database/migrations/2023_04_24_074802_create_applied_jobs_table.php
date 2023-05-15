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
        Schema::create('applied_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->contrained('employee','id')->cascadeOnDelete();
            $table->foreignId('recruiter_id')->contrained('recruiter','id')->cascadeOnDelete();
            $table->foreignId('job_post_id')->contrained('job_post','id')->cascadeOnDelete();
            $table->enum('status',['accepted','rejected','inprogress'])->default('inprogress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applied_jobs');
    }
};
