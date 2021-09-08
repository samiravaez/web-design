<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number');
            $table->unsignedBigInteger('website_type_id')->nullable();
            $table->unsignedBigInteger('familiarity_type_id')->nullable();
            $table->string('email')->unique();
            $table->integer('is_admin')->default(0); //0=user 1=admin
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('mobile_verified')->default(0);
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('website_type_id')->references('id')->on('website_types');
            $table->foreign('familiarity_type_id')->references('id')->on('familiarity_types');
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
