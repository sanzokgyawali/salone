<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ward_nos', function (Blueprint $table) {
            $table->bigIncrements('ward_id');
            $table->unsignedBigInteger("mun_id");
            $table->foreign("mun_id")->references("mun_id")->on("city_names");
            $table->string("ward_no");
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
        Schema::dropIfExists('ward_nos');
    }
}
