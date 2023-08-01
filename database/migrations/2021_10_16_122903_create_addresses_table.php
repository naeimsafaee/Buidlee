<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration {

    public function up() {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->text('address');
            $table->string('amount');
            $table->string('currency');
            $table->string('charge_code');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('addresses');
    }
}
