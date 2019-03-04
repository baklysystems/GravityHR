<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('photo');
            $table->string('code');
            $table->string('biometric_id')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('nickname')->nullable();
            //$table->string('name');
            $table->string('job_title');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('gender')->nullable();
            $table->string('civil_status')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            //$table->string('number');
            $table->string('qualification')->nullable();
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('work_email')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_person_relationship')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->string('contact_person_alt_phone')->nullable();
            //$table->string('emergency_number');
            //$table->string('pan_number');
            $table->string('sss_number')->nullable();
            $table->string('pagibig_number')->nullable();
            $table->string('philhealth_number')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('health_insurance_number')->nullable();
            //$table->string('father_name');
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('department')->nullable();
            $table->string('salary')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            //$table->string('ifsc_code');
            //$table->string('pf_account_number');
            //$table->string('un_number');
            //$table->tinyInteger('pf_status');
            $table->integer('shift_id')->unsigned();
            //$table->foreign('shift_id')->references('id')->on('shift_managers')->onDelete('cascade');
            $table->date('date_of_resignation')->nullable();
            $table->integer('reporting_to')->unsigned();
            //$table->foreign('reporting_to')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('employees');
    }
}
