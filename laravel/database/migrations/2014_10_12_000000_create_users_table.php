<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_type');
            $table->integer('subscription_id');
            $table->string('firstname',100);
            $table->string('lastname',100);
            $table->string('email_address',200)->unique();
            $table->string('mobile_no',100)->nullable();
            $table->string('street_address', 200)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('dob')->nullable();
            $table->string('username', 200);
            $table->string('password', 200);
            $table->integer('status');
            $table->dateTime('last_login');
            //$table->string('created_at');
            //$table->string('updated_at');
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
