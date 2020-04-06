<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsedVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_vacations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('starts_at');
            $table->date('ends_at')->nullable();

            $table->string('note')->nullable();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('vacation_id');
            $table->foreign('vacation_id')->references('id')->on('vacations')->onDelete('cascade');

            $table->index(['deleted_at']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('used_vacations');
    }
}
