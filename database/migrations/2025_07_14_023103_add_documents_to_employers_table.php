<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocumentsToEmployersTable extends Migration
{
    public function up()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->boolean('documents_submitted')->default(false);
            $table->boolean('approved_by_peso')->default(false);
            $table->boolean('approved_by_dole')->default(false);
        });
    }

    public function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn(['documents_submitted', 'approved_by_peso', 'approved_by_dole']);
        });
    }
}
