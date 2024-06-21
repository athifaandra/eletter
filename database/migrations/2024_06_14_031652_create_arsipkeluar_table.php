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
        Schema::create('arsipkeluar', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->string('penerima');
            $table->string('nomor_agenda');
            $table->date('tanggal_agenda');
            $table->date('tanggal_surat');
            $table->text('ringkasan');
            $table->string('lampiran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsipkeluar');
    }
};
