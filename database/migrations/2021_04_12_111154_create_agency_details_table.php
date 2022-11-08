<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('type')->default('1')->comment('individual,company');
            $table->string('agency_name', 30);
            $table->tinyInteger('status')->default('1')->comment('verified,unverified,rejected,blocked');
            $table->string('status_remarks')->nullable();
            $table->string('address')->nullable();
            $table->string('logo', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('agency_phone')->nullable();
            $table->string('agency_mobile')->nullable();
            $table->string('agency_email')->nullable();
            $table->string('other_document')->nullable();
            $table->string('national_id')->nullable();
            $table->string('company_reg_no')->nullable();
            $table->string('vat_pan_no')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->mediumText('short_intro')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agency_details');
    }
}
