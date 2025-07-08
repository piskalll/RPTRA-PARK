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
        Schema::create('facility_reservations', function (Blueprint $table) {
        $table->id();
        $table->date('reservation_date'); // tanggal reservasi
        $table->string('name'); // nama pengunjung
        $table->string('instance')->nullable(); // instansi pengunjung
        $table->string('address')->nullable(); // alamat pengunjung
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->integer('number_of_people'); // jumlah orang yang datang
        $table->string('status')->default('pending'); // status reservasi, misalnya: pending, confirmed, cancelled
        $table->datetime('hour_start')->nullable(); // jam mulai reservasi
        $table->datetime('hour_end')->nullable(); // jam selesai reservasi
        $table->string('indoor_outdoor')->default('indoor'); // jenis reservasi, indoor atau outdoor
        $table->unsignedBigInteger('facility_id'); // fasilitas yang dipesan
        $table->text('notes')->nullable(); // catatan tambahan
        $table->timestamps();

        $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_reservation');
    }
};
