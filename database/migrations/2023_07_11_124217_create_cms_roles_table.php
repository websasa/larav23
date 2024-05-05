<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsRolesTable extends Migration
{
    public function up()
    {
        Schema::create('cms_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Izravno dodavanje podataka u tablicu
        DB::table('cms_roles')->insert([
            'name' => 'Administrator',
            'description' => 'Administrator role with full access.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('cms_roles')->insert([
            'name' => 'Editor',
            'description' => 'Editor role with limited access.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('cms_roles');
    }
}