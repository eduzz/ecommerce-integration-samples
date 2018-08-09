<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    public function up()
    {
        Schema::create("products", function (Blueprint $table){
            $table->increments("id");
            $table->string("product_title");
            $table->string("description");
            $table->float("price", 4, 2);
            $table->integer("my_eduzz_id");
            $table->integer("checkout_id");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("products");
    }
}
