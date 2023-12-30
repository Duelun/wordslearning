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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('iso1', 2)->unique();
            $table->string('iso2', 3);
            $table->string('iso3', 3);
            $table->text('isoname')->nullable();
            $table->text('nativename')->nullable();
            $table->boolean('active')->default(false);
            $table->string('country', 3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
