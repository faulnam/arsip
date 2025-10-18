<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            // Tambah kolom yang sesuai form & controller kamu
            if (!Schema::hasColumn('archives', 'description')) {
                $table->text('description')->nullable()->after('title');
            }
            if (!Schema::hasColumn('archives', 'date')) {
                $table->date('date')->nullable()->after('description');
            }
            if (!Schema::hasColumn('archives', 'location')) {
                $table->string('location')->nullable()->after('date');
            }
            if (!Schema::hasColumn('archives', 'organizer')) {
                $table->string('organizer')->nullable()->after('location');
            }
            if (!Schema::hasColumn('archives', 'material')) {
                // menyimpan path file pdf (nama kamu pakai 'material' di controller)
                $table->string('material')->nullable()->after('organizer');
            }
            if (!Schema::hasColumn('archives', 'documentation')) {
                // menyimpan json array paths untuk banyak gambar
                $table->json('documentation')->nullable()->after('material');
            }
            // Pastikan video_embed bertipe teks panjang (jika belum, ubah)
            if (Schema::hasColumn('archives', 'video_embed')) {
                // nothing (assume exists) — if it's string, we'll alter below
            } else {
                $table->longText('video_embed')->nullable()->after('documentation');
            }
        });
    }

    public function down(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            // drop only if exists to be safe
            $cols = ['description', 'date', 'location', 'organizer', 'material', 'documentation', 'video_embed'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('archives', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
