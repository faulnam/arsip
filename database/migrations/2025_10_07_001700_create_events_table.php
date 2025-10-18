<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->string('location')->nullable();
            $table->string('organizer')->nullable();
            $table->string('speaker')->nullable();
            $table->string('poster')->nullable(); // filename/path
            $table->enum('status', ['Akan Datang', 'Sedang Berlangsung', 'Selesai'])->default('Akan Datang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}

