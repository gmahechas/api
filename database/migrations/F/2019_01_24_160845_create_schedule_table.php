<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_schedule', function (Blueprint $table) {
            $table->increments('schedule_id');
            $table->string('schedule_name', 64);
            
            $table->timestamp('schedule_created_at')->nullable();
            $table->timestamp('schedule_updated_at')->nullable();
            $table->softDeletes('schedule_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('XXX_schedule');
    }
}
