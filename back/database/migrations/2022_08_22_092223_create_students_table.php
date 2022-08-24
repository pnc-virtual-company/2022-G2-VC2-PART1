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
            $table->string('password');
            $table->integer('role')->default('0');
            $table->rememberToken();
            $table->string('phone');
            $table->string('passwords')->default('7');
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
