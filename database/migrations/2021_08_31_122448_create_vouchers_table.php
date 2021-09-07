<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('times_used')->unsigned()->nullable();
            $table->integer('max_uses')->unsigned()->nullable();
            $table->integer('max_uses_user')->unsigned()->nullable();
//            $table->tinyInteger('type')->unsigned(); //it can be voucher,discount, sale or whatever
            $table->integer('discount_value')->nullable()->default(0);
            $table->boolean('discount_type')->default(0 )->nullable(); //0=constant 1=percent
            $table->integer('min_price')->nullable();
            $table->integer('max_price')->nullable();
            $table->json('invalid_users')->nullable();
            $table->json('invalid_products')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('vouchers');
    }
}
