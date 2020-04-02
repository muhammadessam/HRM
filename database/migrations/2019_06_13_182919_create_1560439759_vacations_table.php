<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1560439759VacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('vacations')) {
            Schema::create('vacations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('days')->nullable()->unsigned();
                $table->string('repetition');
                $table->string('accumulated');
                $table->string('salary_affected');
                $table->string('can_be_exceeded');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacations');
    }
}
