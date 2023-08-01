<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobIdToAddressesTable extends Migration {

    public function up() {
        Schema::table('addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
        });
    }

    public function down() {
        Schema::table('addresses', function (Blueprint $table) {
            //
        });
    }
}
