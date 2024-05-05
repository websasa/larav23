<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Izravno dodavanje podataka u tablicu
        DB::table('pages')->insert([
            'title' => 'Naslovnica',
            'content' => 'Ovo je sadržaj naslovnice.',
            'image' => 'naslovna.jpg', // Možete unijeti ime slike ako je to primjereno
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       
    }

    public function down()
    {
        Schema::dropIfExists('pages');


    }
}