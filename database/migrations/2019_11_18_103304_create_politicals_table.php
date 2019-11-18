<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politicals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('political_view_id')->nullable();
            $table->foreign('political_view_id')->references('id')->on('political_views')->onDelete('cascade');
            $table->unsignedBigInteger('wing_id')->nullable();
            $table->foreign('wing_id')->references('id')->on('wings')->onDelete('cascade');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('politicals');
    }
}
