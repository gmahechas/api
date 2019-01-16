<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_menu', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->string('menu_name', 64);
            $table->boolean('menu_title_case');
            $table->boolean('menu_upper_case');
            $table->string('menu_uri', 64)->nullable();

            $table->integer('menu_parent_id')->nullable()->unsigned();
            $table->foreign('menu_parent_id')
                  ->references('menu_id')
                  ->on('c_menu')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamp('menu_created_at')->nullable();
            $table->timestamp('menu_updated_at')->nullable();
            $table->softDeletes('menu_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_menu');
    }
}
