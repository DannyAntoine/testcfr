<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_data', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('family_id');
        $table->binary('client_file')->nullable();
        $table->timestamps();

        $table->foreign('family_id')->references('id')->on('family');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('client_data');
        //Schema::table('client_data', function (Blueprint $table) {
            //
       // });
    }
};
