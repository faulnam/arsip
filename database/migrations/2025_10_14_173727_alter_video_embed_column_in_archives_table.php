<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            // ubah tipe kolom video_embed jadi longText
            $table->longText('video_embed')->change();
        });
    }

    public function down(): void
    {
        Schema::table('archives', function (Blueprint $table) {
            $table->string('video_embed', 255)->change();
        });
    }
};
