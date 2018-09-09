<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOfficeProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('three_user_office_project', function (Blueprint $table) {
            $table->increments('user_office_project_id');
            $table->boolean('user_office_project_status');

            $table->timestamp('user_office_project_created_at')->nullable();
            $table->timestamp('user_office_project_updated_at')->nullable();
            $table->softDeletes('user_office_project_deleted_at');

            $table->integer('user_office_id')->unsigned();
            $table->foreign('user_office_id')
                  ->references('user_office_id')
                  ->on('two_user_office')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                  ->references('project_id')
                  ->on('three_project')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('three_user_office_project');
    }
}
