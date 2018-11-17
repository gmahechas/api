<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('one_company', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('company_name', 64);
            $table->string('company_identification', 128);
            
            $table->timestamp('company_created_at')->nullable();
            $table->timestamp('company_updated_at')->nullable();
            $table->softDeletes('company_deleted_at');

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
        Schema::dropIfExists('one_company');
    }
}
