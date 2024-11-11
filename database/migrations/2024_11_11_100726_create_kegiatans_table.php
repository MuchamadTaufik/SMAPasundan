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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_kegiatans_id')->constrained()->onDelete('cascade');
            $table->foreignId('biodata_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('topik');
            $table->string('tujuan');
            $table->string('pemateri')->nullable();
            $table->string('rencana_tindak_lanjut');
            $table->string('tempat_select');
            $table->string('tempat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
