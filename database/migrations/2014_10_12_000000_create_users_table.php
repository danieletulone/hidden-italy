<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
						$table->string('nickname');
            $table->string('name');
						$table->string('surname');
						$table->string('password');
						$table->integer('points');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

						$table->bigInteger('role_id')->unsigned();
						$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

						$table->bigInteger('image_id')->unsigned();
						$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');

						$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
