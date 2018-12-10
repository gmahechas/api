<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_type_person', function (Blueprint $table) {
            $table->increments('type_person_id');
            $table->string('type_person_code', 16);
            $table->string('type_person_description', 64);

            $table->timestamp('type_person_created_at')->nullable();
            $table->timestamp('type_person_updated_at')->nullable();
            $table->softDeletes('type_person_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_type_person');
    }
}
