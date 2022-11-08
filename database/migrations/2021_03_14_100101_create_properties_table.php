<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);
            $table->string('property_status')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('property_detail')->nullable();
            $table->string('property_address')->nullable();
            $table->text('map_location')->nullable();
            $table->unsignedBigInteger('city_id');

            $table->unsignedBigInteger('bed');
            $table->unsignedBigInteger('bath');

            $table->unsignedBigInteger('area_id');
            $table->string('zipcode')->nullable();
            $table->string('total_area')->nullable();
            $table->string('total_area_unit')->nullable();
            $table->string('built_up_area')->nullable();
            $table->string('built_up_area_unit')->nullable();
            $table->string('property_facing')->nullable();
            $table->string('road_access')->nullable();
            $table->string('road_access_unit')->nullable();
            $table->string('road_type')->nullable();
            $table->decimal('start_price', 11, 2)->default(0);
            $table->decimal('end_price', 11, 2)->default(0);
            $table->string('price_label')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_address')->nullable();
            $table->string('owner_phone')->nullable();
            $table->string('youtube_video_id')->nullable();
            $table->boolean('feature')->default(false);
            $table->boolean('insurance')->default(false);

            $table->boolean('negotiable')->default(false);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('view_count')->default(1);
            $table->boolean('premium_property')->default(false);
            $table->boolean('hasAgent')->default(false);
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('property_categories')->onDelete('cascade')->onUpdatae('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('verified_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
