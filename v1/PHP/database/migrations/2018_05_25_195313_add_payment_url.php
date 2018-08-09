<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentUrl extends Migration
{
    public function up()
    {
        Schema::table("orders", function (Blueprint $table) {
            $table->string("payment_url");
        });
    }

    public function down()
    {
        Schema::table("orders", function (Blueprint $table) {
            $table->dropColumn("payment_url");
        });
    }
}
