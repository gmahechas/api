<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMacroprojectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_macroproject', function (Blueprint $table) {
            $table->increments('macroproject_id');
            $table->string('macroproject_name', 128);
            $table->string('macroproject_address', 128);
            $table->string('macroproject_phone', 32);
            
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')
                  ->references('city_id')
                  ->on('a_city')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('office_id')->unsigned();
            $table->foreign('office_id')
                  ->references('office_id')
                  ->on('b_office')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamp('macroproject_created_at')->nullable();
            $table->timestamp('macroproject_updated_at')->nullable();
            $table->softDeletes('macroproject_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_macroproject');
    }
}
