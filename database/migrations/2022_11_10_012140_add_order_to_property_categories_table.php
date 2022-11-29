<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderToPropertyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->after('id')->nullable();
            $table->integer('order')->after('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_categories_', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->dropColumn('parent_id');
        });
    }
}
