<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypePersonIdentificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_type_person_identification', function (Blueprint $table) {
            $table->increments('type_person_identification_id');
            $table->string('type_person_identification_code', 16);
            $table->string('type_person_identification_description', 64);

            $table->timestamp('type_person_identification_created_at')->nullable();
            $table->timestamp('type_person_identification_updated_at')->nullable();
            $table->softDeletes('type_person_identification_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_type_person_identification');
    }
}
