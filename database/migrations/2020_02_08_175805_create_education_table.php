<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id')->nullable()->unsigned();
            $table->string('edu_collage')->nullable();
            $table->string('edu_high')->nullable();
            $table->string('edu_senior')->nullable();
            $table->string('edu_magister')->nullable();
            $table->string('edu_doctor')->nullable();
            $table->string('edu_universities')->nullable();
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
        Schema::dropIfExists('education');
    }
}
