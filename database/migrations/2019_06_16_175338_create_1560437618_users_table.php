<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1560437618UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('matriculate');
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('identity_number');
                $table->double('salary', 8, 2)->nullable();
                $table->string('birth_date_h')->nullable();
                $table->date('birth_date_m')->nullable();
                $table->string('sex');
                $table->string('situation')->nullable();
                $table->string('nationality')->nullable();
                $table->string('phone')->nullable();
                $table->string('address')->nullable();
                $table->date('hire_date')->nullable();
                $table->date('hire_end')->nullable();
                $table->string('end_reason')->nullable();

                $table->timestamps();
                $table->softDeletes();
                $table->rememberToken();

                $table->index(['deleted_at']);

                $table->unsignedInteger('degree_id')->nullable();
                $table->foreign('degree_id')->references('id')->on('degrees');

                $table->unsignedInteger('department_id')->nullable();
                $table->foreign('department_id')->references('id')->on('departments');

                $table->unsignedInteger('specialty_id')->nullable();
                $table->foreign('specialty_id')->references('id')->on('specialties');
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
        Schema::dropIfExists('users');
    }
}
