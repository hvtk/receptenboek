<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadedInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloaded_infos', function (Blueprint $table) {
            $table->bigIncrements('downloadedInfoId');
            $table->unsignedBigInteger('user_id');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            //set user_id as a foreign key and the DownloadedInfo will be deleted if we delete the user
            $table->foreign('user_id')
            ->unsigned()
            ->references('userId')
            ->on('users')
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
        Schema::dropIfExists('downloaded_infos');
    }
}
