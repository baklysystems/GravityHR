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
            $table->string('biometric_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('suffix');
            $table->string('nickname');
            //$table->string('name');
            $table->tinyInteger('status');
            $table->tinyInteger('gender');
            $table->string('civil_status');
            $table->date('date_of_birth');
            $table->date('date_of_joining');
            $table->string('number');
            $table->string('qualification');
            $table->string('primary_phone');
            $table->string('secondary_phone');
            $table->string('contact_person');
            $table->string('contact_person_relationship');
            $table->string('contact_person_phone');
            $table->string('contact_person_alt_phone');
            //$table->string('emergency_number');
            //$table->string('pan_number');
            $table->string('sss_number');
            $table->string('pagibig_number');
            $table->string('philhealth_number');
            $table->string('tin_number');
            $table->string('health_insurance_number');
            //$table->string('father_name');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->tinyInteger('formalities');
            $table->tinyInteger('offer_acceptance');
            $table->string('probation_period');
            $table->date('date_of_confirmation');
            $table->string('department');
            $table->string('salary');
            $table->string('account_number');
            $table->string('bank_name');
            //$table->string('ifsc_code');
            //$table->string('pf_account_number');
            //$table->string('un_number');
            //$table->tinyInteger('pf_status');
            $table->date('date_of_resignation');
            $table->string('notice_period');
            $table->date('last_working_day');
            $table->tinyInteger('full_final');
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
