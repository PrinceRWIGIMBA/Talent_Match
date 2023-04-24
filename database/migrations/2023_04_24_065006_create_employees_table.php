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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_email')->contrained('users','email')->cascadeOnDelete();
            $table->string('avilability');
            $table->string('phone');
            $table->enum('gender',['male','female']);
            $table->date('dob');
            $table->string('region');
            $table->string('address');
            $table->string('patch');
            $table->string('file');
            $table->string('link');
            $table->string('profile');
            $table->string('about');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
