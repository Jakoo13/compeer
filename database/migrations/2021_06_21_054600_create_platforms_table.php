<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //$table->integer('user_id')->unsigned();
            $table->boolean('onePassword')->default('0')->nullable();
            $table->boolean('dressbarnEmail')->default('0')->nullable();
            $table->boolean('dressbarnSlack')->default('0')->nullable();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platforms');
    }
}
