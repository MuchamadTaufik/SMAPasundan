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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->string('permasalahan');
            $table->string('tujuan');
            $table->string('pihak_terlibat');
            $table->string('alamat');
            $table->string('ringkasan');
            $table->string('rencana_tindak_lanjut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
