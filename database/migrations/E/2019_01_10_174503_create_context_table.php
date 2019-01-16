<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_context', function (Blueprint $table) {
            $table->increments('context_id');
            $table->string('context_description', 128);

            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')
                  ->references('menu_id')
                  ->on('c_menu')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
                  
            $table->timestamp('context_created_at')->nullable();
            $table->timestamp('context_updated_at')->nullable();
            $table->softDeletes('context_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_context');
    }
}
