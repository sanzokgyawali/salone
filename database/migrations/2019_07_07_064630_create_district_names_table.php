<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_names', function (Blueprint $table) {
            $table->bigIncrements('district_id');
            $table->unsignedBigInteger("state_id");
            $table->foreign("state_id")->references("state_id")->on("state_names");
            $table->string("district_name");
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
        Schema::dropIfExists('district_names');
    }
}
