<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('material')->nullable();       // file path for material
            $table->string('documentation')->nullable();  // image/photo filename/path
            $table->string('video_embed')->nullable();
            $table->string('report_file')->nullable();    // report file path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('archives');
    }
}
