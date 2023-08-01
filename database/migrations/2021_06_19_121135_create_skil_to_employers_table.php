<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkilToEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skil_to_employers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedBigInteger('employer_id');
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers')
                ->onDelete('cascade')->onUpdate('cascade');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skil_to_employers');
    }
}
