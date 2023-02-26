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
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('realpassword');
            $table->integer('usertype')->default(1);
            $table->string('mobile');
            $table->longText('address')->nullable();
            $table->longText('signature')->nullable();
            $table->longText('profile_image')->nullable();
            $table->string('position');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_delete')->default(0);
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
