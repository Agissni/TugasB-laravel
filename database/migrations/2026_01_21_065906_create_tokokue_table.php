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
        Schema::create('tokokue', function (Blueprint $table) {
        $table->id(); // Ini otomatis menjadi Primary Key 'id'
        $table->unsignedBigInteger('kategori_id');
        $table->string('nama');
        $table->string('ketersediaan');
        $table->text('detail');
        $table->timestamps(); // Menambahkan created_at & updated_atphp artisan serve
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokokue');
    }
};
