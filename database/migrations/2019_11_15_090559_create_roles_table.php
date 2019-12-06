<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
  

        DB::table('roles')->insert(array(
                'name' => 'Admin',
                'slug' => 'admin',
                'created_at' => date('Y-m-d H:m:s')
            ));

        DB::table('roles')->insert(array(
            'name' => 'User',
            'slug' => 'user',
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
        Schema::dropIfExists('roles');
    }
}
