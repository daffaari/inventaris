<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//use DB;

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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // DB::insert('insert into users (id, name, username) values (?, ?)', [1, 'ADMIN', 'admin', '$2y$10$QyaVtQtcbgo9yD7M4d5jpuDWnZ6QnXu5fXcXAoByZ5A6g5POk1EmS']);
        User::create(
            [
                'username' => 'admin',
                'name' => 'ADMIN',
                'password' => '$2y$10$QyaVtQtcbgo9yD7M4d5jpuDWnZ6QnXu5fXcXAoByZ5A6g5POk1EmS'
            ]
        );
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
