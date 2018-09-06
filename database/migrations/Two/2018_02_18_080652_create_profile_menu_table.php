<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('two_profile_menu', function (Blueprint $table) {
            $table->increments('profile_menu_id');
            $table->enum('profile_menu_status', ['1', '2']);

            $table->timestamp('profile_menu_created_at')->nullable();
            $table->timestamp('profile_menu_updated_at')->nullable();
            $table->softDeletes('profile_menu_deleted_at');

            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')
                  ->references('profile_id')
                  ->on('two_profile')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')
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
        Schema::dropIfExists('two_profile_menu');
    }
}
