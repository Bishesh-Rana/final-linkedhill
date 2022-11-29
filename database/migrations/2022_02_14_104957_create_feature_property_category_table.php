<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturePropertyCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_property_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feature_id')->references('id')->on('features')->constrained();
            $table->foreignId('property_category_id')->references('id')->on('property_categories')->constrained();
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
        Schema::dropIfExists('feature_property_category');
    }
}
