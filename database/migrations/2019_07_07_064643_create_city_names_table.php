<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_names', function (Blueprint $table) {
            $table->bigIncrements('mun_id');
            $table->unsignedBigInteger("district_id");
            $table->foreign("district_id")->references("district_id")->on("district_names");
            $table->string("muncipality_name");
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
        Schema::dropIfExists('city_names');
    }
}
