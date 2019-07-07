<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_logins', function (Blueprint $table) {
            $table->bigIncrements('cust_id');
            $table->string("cust_full_name");
            $table->string("cust_display_name");
            $table->string("cust_email")->unique();
            $table->string("cust_phone");
            $table->unsignedBigInteger("ward_id");
            $table->foreign("ward_id")->references("ward_id")->on("ward_nos");
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
        Schema::dropIfExists('customer_logins');
    }
}
