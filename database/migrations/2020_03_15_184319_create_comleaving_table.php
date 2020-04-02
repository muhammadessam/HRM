<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComleavingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comleavings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user');
            $table->date('datecomnig');
            $table->date('dateleaving');
            $table->enum('status' , ['coming' , 'leaving']);
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
        Schema::dropIfExists('comleavings');
    }
}
