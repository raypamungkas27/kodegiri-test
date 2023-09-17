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
        Schema::create('documents', function (Blueprint $table) {
            $table->string('id', 150)->primary();;
            $table->string('title', 200);
            $table->string('content', 200);
            $table->string('tanggal_signing', 200);
            $table->string('jabatan_signing', 200);
            $table->string('nama_signing', 200);
            $table->string('signing', 200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
