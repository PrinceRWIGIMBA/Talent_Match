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
            $table->foreignId('recruiter_id')->contrained('recruiter','id')->cascadeOnDelete();
            $table->enum('type',['full_time','part_time']);
            $table->integer('no_opening');
            $table->integer('working_days');
            $table->string('position');
            $table->string('category');
            $table->text('description');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->string('to_do');
            $table->string('experience');
            $table->text('requirement');
            $table->enum('status',['approved','rejected','pending'])->default('pending');
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
