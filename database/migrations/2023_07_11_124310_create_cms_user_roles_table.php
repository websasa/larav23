<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsUsersRolesTable extends Migration
{
    public function up()
    {
        Schema::create('cms_users_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            // Definirajte strane ključeve
            $table->foreign('user_id')->references('id')->on('cms_users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('cms_roles')->onDelete('cascade');
        });

        // Izravno dodavanje podataka u tablicu
        DB::table('cms_users_roles')->insert([
            'user_id' => 1, // Zamijenite 1 sa stvarnim ID-em korisnika
            'role_id' => 1, // Zamijenite 1 sa stvarnim ID-em uloge
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
    }

    public function down()
    {
        Schema::dropIfExists('cms_users_roles');
    }
}
