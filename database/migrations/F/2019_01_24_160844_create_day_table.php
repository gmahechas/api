<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_day', function (Blueprint $table) {
            $table->increments('day_id');
            $table->string('day_code', 8);
            $table->string('day_name', 16);
            $table->timestamp('day_created_at')->nullable();
            $table->timestamp('day_updated_at')->nullable();
            $table->softDeletes('day_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f_day');
    }
}
