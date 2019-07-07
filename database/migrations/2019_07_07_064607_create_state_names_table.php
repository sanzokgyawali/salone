<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_names', function (Blueprint $table) {
            $table->bigIncrements('state_id');
            $table->unsignedBigInteger("country_id");
            $table->foreign("country_id")->references("country_id")->on("country_names");
            $table->string("state_name");
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
        Schema::dropIfExists('state_names');
    }
}
