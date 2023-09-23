<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsUsersTable extends Migration
{
    public function up()
    {
        Schema::create('cms_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        // Izravno dodavanje podataka u tablicu
        DB::table('cms_users')->insert([
            'name' => 'Sasa',
            'email' => 'chilliweb34@gmail.com',
            'password' => bcrypt('sasa1234'), // Možete koristiti bcrypt() funkciju za enkripciju lozinke
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('cms_users');
    }
}