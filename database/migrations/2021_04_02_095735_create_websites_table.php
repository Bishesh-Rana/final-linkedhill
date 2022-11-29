<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo', 200)->nullable();
            $table->string('logo_footer', 200)->nullable();
            $table->string('favicon', 200)->nullable();
            $table->string('email', 50);
            $table->string('alternate_email', 50)->nullable();
            $table->string('phone', 20);
            $table->string('currency', 20);
            $table->string('fb_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('playstore_url')->nullable();
            $table->string('appstore_url')->nullable();
            $table->string('short_intro')->nullable();
            $table->text('map_url')->nullable();
            $table->text('short_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('address')->nullable();
            $table->string('og_image')->nullable();


            $table->string('pro_title')->nullable();
            $table->mediumText('pro_sub_title')->nullable();


            $table->string('second_pro_title')->nullable();
            $table->mediumText('second_pro_sub_title')->nullable();

            $table->string('blog_title')->nullable();
            $table->mediumText('blog_sub_title')->nullable();

            $table->string('login_title')->nullable();
            $table->mediumText('login_sub_title')->nullable();
            $table->mediumText('second_login_sub_title')->nullable();
            $table->mediumText('third_login_sub_title')->nullable();
            $table->mediumText('four_login_sub_title')->nullable();



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
        Schema::dropIfExists('websites');
    }
}
