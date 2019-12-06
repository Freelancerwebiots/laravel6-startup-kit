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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_pic')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('is_active')->comment('0 = Block, 1 = Active')->default(1);
            $table->string('api_token')->nullable();
            $table->integer('otp')->nullable();
            $table->integer('session_otp')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        DB::table('users')->insert(array(
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => date('Y-m-d H:m:s'),
            'password' => bcrypt('admin123!'),
            'role_id' => 1,
            'is_active' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ));

        DB::table('users')->insert(array(
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => date('Y-m-d H:m:s'),
            'password' => bcrypt('user123!'),
            'role_id' => 2,
            'is_active' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ));
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
