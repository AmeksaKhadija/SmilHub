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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('role', ['patient', 'dentiste', 'admin'])->default('patient');
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->engine = "InnoDB";
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
