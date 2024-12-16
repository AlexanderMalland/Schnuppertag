<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('jobs', function (Blueprint $table) {
        $table->foreign('company_id', 'jobs_company_id_foreign')  // Eindeutiger Name für den Fremdschlüssel
              ->references('id')->on('companies')
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('jobs', function (Blueprint $table) {
        $table->dropForeign('jobs_company_id_foreign');  // Lösche den Fremdschlüssel mit dem angegebenen Namen
    });
}

};
