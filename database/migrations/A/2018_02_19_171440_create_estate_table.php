<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_estate', function (Blueprint $table) {
            $table->increments('estate_id');
            $table->string('estate_name', 64);
            $table->string('estate_code', 8);

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')
                  ->references('country_id')
                  ->on('a_country')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamp('estate_created_at')->nullable();
            $table->timestamp('estate_updated_at')->nullable();
            $table->softDeletes('estate_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_estate');
    }
}
