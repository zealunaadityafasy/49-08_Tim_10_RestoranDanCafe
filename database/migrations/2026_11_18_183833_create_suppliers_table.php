
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('suppliers')) {
            Schema::create('suppliers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama_supplier', 100);
                $table->string('jenis_pasokan', 50);
                $table->string('alamat', 255);
                $table->string('no_telepon', 20)->nullable();
            });
        }
    }

    public function down(): void
    {
        // Tidak menghapus tabel Supplier yang sudah ada.
    }
};
