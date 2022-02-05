<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->timestamps();

            //set user_id as a foreign key and the account will be deleted if we delete the user
            $table->foreign('user_id')
            ->unsigned()
            ->references('id')
            ->on('user')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_tests');
    }
}
