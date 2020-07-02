<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_identities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cleaning_id');
            $table->unsignedBigInteger('identity_id');
            $table->foreign('cleaning_id')->references('id')->on('cleanings');
            $table->foreign('identity_id')->references('id')->on('identities');
            $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('cleaning_identities');
    }
}
