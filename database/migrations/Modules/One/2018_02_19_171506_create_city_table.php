<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('one_city', function (Blueprint $table) {
            $table->increments('city_id');
            $table->string('city_name', 64);
            $table->string('city_code', 8);
                  
            $table->timestamp('city_created_at')->nullable();
            $table->timestamp('city_updated_at')->nullable();
            $table->softDeletes('city_deleted_at');

            $table->integer('estate_id')->unsigned();
            $table->foreign('estate_id')
                  ->references('estate_id')
                  ->on('one_estate')
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
        Schema::dropIfExists('one_city');
    }
}
