<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobseekerToJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobseeker_to_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('jobseeker_id');
            $table->unsignedBigInteger('employer_id');
            $table->enum('status' , ['waiting' , 'accept' , 'reject'])->default('waiting');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('jobseeker_id')->references('id')->on('jobseekers')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('job_id')->references('id')->on('jobs')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobseeker_to_jobs');
    }
}
