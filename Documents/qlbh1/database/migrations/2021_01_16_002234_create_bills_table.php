<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cart_id');
            $table->string('phone');
            $table->text('shipping_address');
            $table->bigInteger('shipping_price')->default(0)->nullable();
            $table->tinyInteger('status');
            $table->double('sub_total')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
