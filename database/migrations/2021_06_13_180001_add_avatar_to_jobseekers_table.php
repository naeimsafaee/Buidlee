<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarToJobseekersTable extends Migration
{
    public function up()
    {
        Schema::table('jobseekers', function (Blueprint $table) {
            $table->text('avatar')->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobseekers', function (Blueprint $table) {
            //
        });
    }
}
