<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_person', function (Blueprint $table) {
            $table->increments('person_id');
            $table->string('person_identification', 64)->unique();
            $table->date('person_identification_date_issue')->nullable();
            $table->string('person_first_name', 64)->nullable();
            $table->string('person_second_name', 64)->nullable();
            $table->string('person_first_surname', 64)->nullable();
            $table->string('person_second_surname', 64)->nullable();
            $table->string('person_legal_name', 128)->nullable();
            $table->string('person_address', 128)->nullable();
            $table->string('person_email', 128)->nullable();
            $table->string('person_phone', 128)->nullable();

            $table->integer('type_person_id')->unsigned();
            $table->foreign('type_person_id')
                  ->references('type_person_id')
                  ->on('c_type_person')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('type_person_identification_id')->unsigned();
            $table->foreign('type_person_identification_id')
                    ->references('type_person_identification_id')
                    ->on('c_type_person_identification')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->integer('city_issue_id')->unsigned();
            $table->foreign('city_issue_id')
                  ->references('city_id')
                  ->on('a_city')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('city_location_id')->unsigned();
            $table->foreign('city_location_id')
                  ->references('city_id')
                  ->on('a_city')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamp('person_created_at')->nullable();
            $table->timestamp('person_updated_at')->nullable();
            $table->softDeletes('person_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_person');
    }
}
