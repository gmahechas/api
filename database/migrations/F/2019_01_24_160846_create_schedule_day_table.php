<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_schedule_day', function (Blueprint $table) {
            $table->increments('schedule_day_id');
            $table->boolean('schedule_day_status');

            $table->integer('schedule_id')->unsigned();
            $table->foreign('schedule_id')
                  ->references('schedule_id')
                  ->on('f_schedule')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')
                  ->references('day_id')
                  ->on('f_day')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamp('schedule_day_created_at')->nullable();
            $table->timestamp('schedule_day_updated_at')->nullable();
            $table->softDeletes('schedule_day_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XXX_schedule_day');
    }
}
