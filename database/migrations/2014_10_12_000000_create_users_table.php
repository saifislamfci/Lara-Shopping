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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('user_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('password');

            $table->unsignedInteger('division_id');
            $table->unsignedInteger('districs_id');

            $table->string('parmanent_address');
            $table->string('shipping_address')->nullable();

            $table->unsignedTinyInteger('status')->default(0)->comment('0=Inactive|1=active|2=ben');
            $table->string('ip_address')->nullable();
            $table->string('avater')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
