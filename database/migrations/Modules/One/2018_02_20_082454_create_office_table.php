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
        Schema::create('one_office', function (Blueprint $table) {
            $table->increments('office_id');
            $table->string('office_name', 64);
            
            $table->timestamp('office_created_at')->nullable();
            $table->timestamp('office_updated_at')->nullable();
            $table->softDeletes('office_deleted_at');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                  ->references('company_id')
                  ->on('one_company')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')
                  ->references('city_id')
                  ->on('one_city')
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
        Schema::dropIfExists('one_office');
    }
}
