<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleDayHourRangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_schedule_day_hour_range', function (Blueprint $table) {
            $table->increments('schedule_day_hour_range_id');
            $table->boolean('schedule_day_hour_range_status');

            $table->integer('schedule_day_id')->unsigned();
            $table->foreign('schedule_day_id')
                  ->references('schedule_day_id')
                  ->on('f_schedule_day')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('hour_range_id')->unsigned();
            $table->foreign('hour_range_id')
                  ->references('hour_range_id')
                  ->on('f_hour_range')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamp('schedule_day_hour_range_created_at')->nullable();
            $table->timestamp('schedule_day_hour_range_updated_at')->nullable();
            $table->softDeletes('schedule_day_hour_range_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f_schedule_day_hour_range');
    }
}
