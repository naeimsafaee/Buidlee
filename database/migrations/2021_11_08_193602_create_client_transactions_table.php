<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTransactionsTable extends Migration {

    public function up() {
        Schema::create('client_transactions', function(Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('job_id');
            $table->string('amount');
            $table->boolean('paid')->default(false);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('client_transactions');
    }
}
