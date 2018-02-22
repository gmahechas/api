<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('one_state', function (Blueprint $table) {
            $table->increments('state_id');
            $table->string('state_name', 64);
            $table->string('state_code', 8);
            
            $table->timestamp('state_created_at')->nullable();
            $table->timestamp('state_updated_at')->nullable();
            $table->softDeletes('state_deleted_at');

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')
                  ->references('country_id')
                  ->on('one_country')
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
        Schema::dropIfExists('one_state');
    }
}
