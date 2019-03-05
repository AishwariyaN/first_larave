<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgcolumnToSchoolDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

         Schema::table('school_details', function (Blueprint $table){
            if (!Schema::hasColumn('school_details', 'user_image')){
                $table->string('user_image')->after('id')->nullable();                
            }          
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('school_details', function (Blueprint $table) {
            if (Schema::hasColumn('school_details', 'user_image')){
                 $table->dropColumn('user_image');               
            }             
        });

    }
}
