<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('family_name');
            $table->string('fname');
            $table->string('lname');
            $table->tinyInteger('age');
            $table->string('employee_reg_num');
            $table->date('employee_BOT');
            $table->string('employee_bith_place');
            $table->longText('employee_address');
            $table->string('employee_nationality');
            $table->string('employee_social_origin');
            $table->boolean('employee_isSoldier');
            $table->string('employee_n_number');
            $table->string('employee_health_number');
            $table->integer('employee_drive_license');
            $table->string('employee_drive_license_mine');
            $table->integer('employee_phone_num');
            $table->integer('employee_phone_num_home');
            $table->string('employee_email1')->unique();
            $table->string('employee_email2')->unique();
            $table->string('employee_revenue');
            $table->string('employee_sizeOf_suits');
            $table->string('employee_appointment');
            $table->string('employee_department');
            $table->string('employee_shift');
            $table->string('employee_live_location');
            $table->string('employee_campus');
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
        Schema::dropIfExists('employees');
    }
}
