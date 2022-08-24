<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained()->onDelete('CASCADE');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('batch');
            $table->string('email');
<<<<<<< HEAD
            $table->string('password');
            $table->integer('role')->default('0');
            $table->rememberToken();
=======
            $table->string('phone');
            $table->string('passwords');
>>>>>>> 435c95a79ad14e400b4b657874fff4af8f9a6615
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};