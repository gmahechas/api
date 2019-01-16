<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContextVarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_context_var', function (Blueprint $table) {
            $table->increments('context_var_id');
            $table->string('context_var_code', 32);
            $table->enum('context_var_type', ['inactive', 'active']);
            $table->string('context_var_description', 128);
            $table->tinyInteger('context_var_order');

            $table->integer('context_id')->unsigned();
            $table->foreign('context_id')
                  ->references('context_id')
                  ->on('e_context')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamp('context_var_created_at')->nullable();
            $table->timestamp('context_var_updated_at')->nullable();
            $table->softDeletes('context_var_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_context_var');
    }
}
