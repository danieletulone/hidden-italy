<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
						$table->string('content');
						$table->bigInteger('user_id')->unsigned();
						$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
						$table->bigInteger('image_id')->unsigned();
						$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
						$table->bigInteger('monument_id')->unsigned();
						$table->foreign('monument_id')->references('id')->on('monuments')->onDelete('cascade');

						$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
