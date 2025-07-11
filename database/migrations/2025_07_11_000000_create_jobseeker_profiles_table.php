<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jobseeker_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('suffix')->nullable();
            $table->string('sex')->nullable();
            $table->string('civil_status')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->integer('age')->nullable();
            $table->string('religion')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('telephone_number')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('preferred_occupation')->nullable();
            $table->string('preferred_industry')->nullable();
            $table->boolean('willing_to_work_local')->default(false);
            $table->boolean('willing_to_work_abroad')->default(false);
            $table->boolean('willing_to_work_immediately')->default(false);
            $table->string('educational_level')->nullable();
            $table->string('school_name')->nullable();
            $table->string('course')->nullable();
            $table->string('year_graduated')->nullable();
            $table->string('honors')->nullable();
            $table->text('skills')->nullable();
            $table->text('languages')->nullable();
            $table->text('certifications')->nullable();
            $table->string('resume_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('jobseeker_profiles');
    }
};
