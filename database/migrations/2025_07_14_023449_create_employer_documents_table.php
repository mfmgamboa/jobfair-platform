<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('employer_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('document_type'); // e.g., DTI, BIR
            $table->string('file_path');
            $table->enum('status', ['pending', 'approved_peso', 'approved_dole'])->default('pending');
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employer_documents');
    }
}
