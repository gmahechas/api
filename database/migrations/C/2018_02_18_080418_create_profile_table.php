<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_profile', function (Blueprint $table) {
            $table->increments('profile_id');
            $table->string('profile_name', 64);

            $table->timestamp('profile_created_at')->nullable();
            $table->timestamp('profile_updated_at')->nullable();
            $table->softDeletes('profile_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_profile');
    }
}
