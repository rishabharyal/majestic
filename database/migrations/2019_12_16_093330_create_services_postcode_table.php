<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesPostcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_postcode', function (Blueprint $table) {
            $table->integer('service_id')->unsigned();
            $table->integer('postcode_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('postcode_id')->references('id')->on('postcodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_postcode');
    }
}
