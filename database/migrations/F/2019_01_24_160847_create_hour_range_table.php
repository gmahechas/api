<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHourRangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_hour_range', function (Blueprint $table) {
            $table->increments('hour_range_id');
            $table->string('hour_range_name', 64);
            $table->string('hour_range_description', 64);
            $table->time('hour_range_start');
            $table->time('hour_range_end');

            $table->timestamp('hour_range_created_at')->nullable();
            $table->timestamp('hour_range_updated_at')->nullable();
            $table->softDeletes('hour_range_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f_hour_range');
    }
}
