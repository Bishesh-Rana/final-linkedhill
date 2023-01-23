<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFilledToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('agency_type')->nullable();
            $table->string('website')->nullable();
            $table->integer('goverment_id_number')->nullable();
            $table->string('pan_card')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('agency_type');
            $table->dropColumn('website');
            $table->dropColumn('goverment_id_number');
            $table->dropColumn('pan_card');
        }); 
    }
}
