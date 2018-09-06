<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('three_project', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('project_name', 128);
            $table->string('project_address', 128);
            $table->string('project_phone', 32);

            $table->timestamp('project_created_at')->nullable();
            $table->timestamp('project_updated_at')->nullable();
            $table->softDeletes('project_deleted_at');

            $table->integer('macroproject_id')->unsigned();
            $table->foreign('macroproject_id')
                  ->references('macroproject_id')
                  ->on('three_macroproject')
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
        Schema::dropIfExists('three_project');
    }
}
