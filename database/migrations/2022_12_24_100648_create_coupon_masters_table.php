<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_masters', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('coupon_code')->unique();
            $table->string('coupon_value');
            $table->enum('coupon_type', ['percentage', 'flat_value'])->default('percentage');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->date('expiry_at');
            $table->boolean('is_used')->default(0);
            $table->string('slug', 100)->uniqid();

            $table->unsignedBigInteger('distributors_id')->nullable();
            $table->foreign('distributors_id')->references('id')->on('distributers');

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
        Schema::dropIfExists('coupon_masters');
    }
}
