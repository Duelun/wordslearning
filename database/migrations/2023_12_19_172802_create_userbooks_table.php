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
        Schema::create('userbooks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
                $table->foreign('user')->references('id')->on('users');
            $table->string('name', 20);
            $table->string('langforeign', 3);
            $table->string('langown', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userbooks');
    }
};
