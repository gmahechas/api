<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_office', function (Blueprint $table) {
            $table->increments('office_id');
            $table->string('office_name', 64);
            
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                  ->references('company_id')
                  ->on('b_company')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')
                  ->references('city_id')
                  ->on('a_city')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamp('office_created_at')->nullable();
            $table->timestamp('office_updated_at')->nullable();
            $table->softDeletes('office_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_office');
    }
}
