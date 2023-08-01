<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->text('avatar')->nullable();
            $table->text('name');
            $table->text('job_title');
            $table->text('email');
            $table->unsignedBigInteger('company_size');
            $table->text('company_name');
            $table->string('company_id')->unique();
            $table->text('password');
            $table->text('ceo')->nullable();
            $table->text('website')->nullable();
            $table->text('social')->nullable();
            $table->unsignedBigInteger('location')->nullable();
            $table->text('salary_from')->nullable();
            $table->text('salary_to')->nullable();
            $table->text('salary_period')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
}
