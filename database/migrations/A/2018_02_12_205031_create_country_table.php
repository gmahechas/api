<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_country', function (Blueprint $table) {
            $table->increments('country_id');
            $table->string('country_name', 64);
            $table->string('country_code', 8);
            
            $table->timestamp('country_created_at')->nullable();
            $table->timestamp('country_updated_at')->nullable();
            $table->softDeletes('country_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_country');
    }
}
