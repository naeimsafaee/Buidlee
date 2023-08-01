<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsCategoryToAddressesTable extends Migration {

    public function up() {
        Schema::table('addresses', function (Blueprint $table) {
            $table->boolean('is_category')->default(false);
        });
    }

    public function down() {
        Schema::table('addresses', function (Blueprint $table) {
            //
        });
    }
}
