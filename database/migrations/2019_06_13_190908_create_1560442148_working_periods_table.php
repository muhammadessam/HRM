<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1560442148WorkingPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('working_periods')) {
            Schema::create('working_periods', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->date('starts_at')->nullable();
                $table->date('finishes_at')->nullable();
                $table->time('starts_at_time');
                $table->time('finishes_at_time');

                $table->unsignedInteger('allowed_in_latency');
                $table->unsignedInteger('allowed_out_latency');

                $table->time('when_no_in_time');
                $table->time('when_no_out_time');

                $table->integer('hours_needed')->nullable()->unsigned();
                
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
        Schema::dropIfExists('working_periods');
    }
}
