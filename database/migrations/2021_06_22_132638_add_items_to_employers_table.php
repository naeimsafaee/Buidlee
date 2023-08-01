<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemsToEmployersTable extends Migration
{

    public function up()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->string('reset_link')->nullable()->after('salary_period');
        });
    }


    public function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            //
        });
    }
}
