<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThingsToJobsTable extends Migration
{

    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->text('salary_from')->nullable()->change();
            $table->text('salary_to')->nullable()->change();
            $table->text('salary_period')->nullable()->change();

            $table->boolean('crypto')->default(false)->after('level');
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
