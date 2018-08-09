<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItems extends Migration
{
    public function up()
    {
        Schema::create("order_items", function (Blueprint $table) {
            $table->integer("order_id")->unsigned();
            $table->integer("product_id")->unsigned();
            $table->integer("amount")->unsigned();
            $table->foreign("order_id")->references("id")
                ->on("orders");
            $table->foreign("product_id")->references("id")
                ->on("products");
            $table->primary(["order_id", "product_id"]);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("order_items");
    }
}
