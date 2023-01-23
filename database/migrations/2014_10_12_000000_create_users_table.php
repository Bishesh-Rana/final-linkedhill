<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profile')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('testP')->nullable();
            $table->string('dob')->nullable();
            $table->date('full_address')->nullable();
            $table->text('access_token')->nullable();
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('social_id')->nullable();
            $table->enum('social_from', ['facebook', 'google', 'normal'])->default('normal');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('otp', 6)->nullable();
            $table->string('referral_code', 8);
            $table->decimal('reward_point')->nullable()->default(0);
            $table->unsignedBigInteger('referred_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('referred_by')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
