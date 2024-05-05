<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('title');
            $table->timestamps();

            // Definirajte strani ključ za vezu s tablicom 'pages'
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });

        // Izravno dodavanje podataka u tablicu
        DB::table('menu_items')->insert([
            'page_id' => 1, // Zamijenite 1 sa stvarnim ID-em stranice
            'title' => 'Home',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       
    }

    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}