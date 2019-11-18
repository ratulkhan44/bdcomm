<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermanentAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permanent_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('division_id')->nullable();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->unsignedBigInteger('upazilla_id')->nullable();
            $table->foreign('upazilla_id')->references('id')->on('upazillas')->onDelete('cascade');
            $table->unsignedBigInteger('pourosava_id')->nullable();
            $table->foreign('pourosava_id')->references('id')->on('pourosavas')->onDelete('cascade');
            $table->unsignedBigInteger('citycorp_id')->nullable();
            $table->foreign('citycorp_id')->references('id')->on('citycorps')->onDelete('cascade');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('union',255)->nullable();
            $table->string('village',255)->nullable();
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
        Schema::dropIfExists('permanent_addresses');
    }
}
