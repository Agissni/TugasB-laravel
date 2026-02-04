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
        Schema::table('tokokue', function (Blueprint $table) {
            $table->integer('harga_kecil')->nullable()->after('detail');
            $table->integer('harga_besar')->nullable()->after('harga_kecil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tokokue', function (Blueprint $table) {
            $table->dropColumn(['harga_kecil', 'harga_besar']);
        });
    }
};
