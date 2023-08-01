<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemsToJobseekersTable extends Migration{

    public function up(){
        Schema::table('jobseekers', function(Blueprint $table){
            $table->string('reset_link')->nullable()->after('cv');
        });
    }

    public function down(){
        Schema::table('jobseekers', function(Blueprint $table){
            //
        });
    }
}
