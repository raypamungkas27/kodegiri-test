<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 150)->primary();;
            $table->string('name', 200);
            $table->string('email', 200);
            $table->string('password', 200);
            $table->string('nohp', 200);
            $table->string('company', 200)->nullable();
            $table->string('divisi', 200)->nullable();
            $table->string('foto_profil', 200)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
