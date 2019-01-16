<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_employee', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->enum('employee_gender', ['male', 'female']);
            $table->date('employee_birth_date');
            $table->date('employee_hire_date');
            $table->string('employee_business_mail', 64);

            $table->integer('person_id')->unique()->unsigned();
            $table->foreign('person_id')
                  ->references('person_id')
                  ->on('c_person')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('city_birth_id')->nullable()->unsigned();
            $table->foreign('city_birth_id')
                  ->references('city_id')
                  ->on('a_city')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
                  
            $table->timestamp('employee_created_at')->nullable();
            $table->timestamp('employee_updated_at')->nullable();
            $table->softDeletes('employee_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_employee');
    }
}
