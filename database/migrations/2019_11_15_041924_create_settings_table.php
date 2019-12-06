<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('value');
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('settings')->insert(array(
            'name' => 'Email Address',
            'value' => 'admin@email.com',
            'slug' => 'email',
            'created_at' => date('Y-m-d H:m:s')
        ));

        DB::table('settings')->insert(array(
            'name' => 'Mobile',
            'value' => '9874563210',
            'slug' => 'mobile',
            'created_at' => date('Y-m-d H:m:s')
        ));

        DB::table('settings')->insert(array(
            'name' => 'Address',
            'value' => '216 , Regal Indl Estate, Acharya Dhonde Marg, Sewree',
            'slug' => 'address',
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
        Schema::dropIfExists('settings');
    }
}
