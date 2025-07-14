<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequiredDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('required_documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('required_documents');
    }
}
