<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_workflow', function (Blueprint $table) {
            $table->increments('workflow_id');
            $table->string('workflow_name', 128);
            $table->string('workflow_description', 256);
            $table->string('workflow_first_activities', 64)->nullable();
            $table->string('workflow_edit_activities', 64)->nullable();
            $table->string('workflow_latest_activities')->nullable();

            $table->timestamp('workflow_created_at')->nullable();
            $table->timestamp('workflow_updated_at')->nullable();
            $table->softDeletes('workflow_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_workflow');
    }
}
