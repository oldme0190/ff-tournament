<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('entry_fee')->default(0);
            $table->integer('prize_pool')->default(0);
            $table->dateTime('match_time');
            $table->integer('total_slots')->default(100);
            $table->integer('joined_slots')->default(0);
            $table->string('type')->default('BR');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
