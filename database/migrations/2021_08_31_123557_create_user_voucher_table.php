<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_voucher', function (Blueprint $table) {
            $table->bigInteger( 'user_id')->unsigned();
            $table->bigInteger('voucher_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'voucher_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_voucher');
    }
}
