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
        Schema::create('reservation_statuses', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50)->unique();
            $table->string("code", 50)->unique();
            $table->string("color_hex", 10);
            $table->string("bg_color_hex", 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_statuses');
    }
};
