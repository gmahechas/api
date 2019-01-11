<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_department', function (Blueprint $table) {
            $table->increments('department_id');
            $table->string('department_name', 64);
            $table->text('department_description');

            $table->timestamp('department_created_at')->nullable();
            $table->timestamp('department_updated_at')->nullable();
            $table->softDeletes('department_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_department');
    }
}
