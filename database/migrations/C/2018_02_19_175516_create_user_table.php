<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('username', 64)->unique();
            $table->string('password', 128);

            $table->integer('person_id')->unique()->unsigned();
            $table->foreign('person_id')
                  ->references('person_id')
                  ->on('c_person')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')
                  ->references('profile_id')
                  ->on('c_profile')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
                  
            $table->timestamp('user_created_at')->nullable();
            $table->timestamp('user_updated_at')->nullable();
            $table->softDeletes('user_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_user');
    }
}
