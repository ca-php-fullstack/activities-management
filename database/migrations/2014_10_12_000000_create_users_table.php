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
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'username' => 'john_smith',
            'password' => Hash::make('secret123')
        ]);
        DB::table('users')->insert([
            'username' => 'rade_j',
            'password' => Hash::make('secret12345')
        ]);
        DB::table('users')->insert([
            'username' => 'radoslav',
            'password' => Hash::make('0107985Marko@')
        ]);
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
