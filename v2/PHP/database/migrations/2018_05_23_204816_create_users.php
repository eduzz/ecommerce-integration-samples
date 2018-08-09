<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        Schema::create("users", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("email");
            $table->string("document");
            $table->string("cellphone");
            $table->integer("profile_id")->unsigned();
            $table->foreign("profile_id")->references("id")
                                        ->on("profiles");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("users");
    }
}
