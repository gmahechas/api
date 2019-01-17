<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_office_department', function (Blueprint $table) {
            $table->increments('office_department_id');
            $table->boolean('office_department_status');

            $table->integer('office_id')->unsigned();
            $table->foreign('office_id')
                  ->references('office_id')
                  ->on('b_office')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')
                  ->references('department_id')
                  ->on('b_department')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamp('office_department_created_at')->nullable();
            $table->timestamp('office_department_updated_at')->nullable();
            $table->softDeletes('office_department_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_office_department');
    }
}
