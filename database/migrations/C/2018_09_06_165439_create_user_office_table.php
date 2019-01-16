<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_user_office', function (Blueprint $table) {
            $table->increments('user_office_id');
            $table->boolean('user_office_status');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('c_user')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('office_id')->unsigned();
            $table->foreign('office_id')
                  ->references('office_id')
                  ->on('b_office')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            
            $table->timestamp('user_office_created_at')->nullable();
            $table->timestamp('user_office_updated_at')->nullable();
            $table->softDeletes('user_office_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_user_office');
    }
}
