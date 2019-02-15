<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToResident extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('residents', function (Blueprint $table) {
            $table->string('res_name');
            $table->string('res_age');
             $table->integer('phn_number');
            
        });

        Schema::create('residents_complains', function (Blueprint $table) {
            $table->increments('complain_id');
            $table->integer('res_id');
            $table->string('res_complain');
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
        //
    }
}
