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
        Schema::create('two_menu', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->string('menu_name', 64);
            $table->string('menu_uri', 64);

            $table->timestamp('menu_created_at')->nullable();
            $table->timestamp('menu_updated_at')->nullable();
            $table->softDeletes('menu_deleted_at');

            $table->integer('menu_id_parent')->nullable()->unsigned();
            $table->foreign('menu_id_parent')
                  ->references('menu_id')
                  ->on('two_menu')
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
        Schema::dropIfExists('two_menu');
    }
}
