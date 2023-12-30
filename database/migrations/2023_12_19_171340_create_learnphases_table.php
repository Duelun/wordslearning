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
        Schema::create('learnphases', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
                $table->primary('id');
                $table->unique('id');
            $table->string('name', 20);
            $table->string('description', 100)->nullable();
            $table->unsignedTinyInteger('minrepait')->default(1);
            $table->unsignedTinyInteger('maxrepait')->default(1);
            $table->unsignedBigInteger('nextphase')->nullable();
            $table->unsignedSmallInteger('nextdelayday')->default(0);
            $table->unsignedBigInteger('errorbackdrop')->nullable();
            $table->unsignedSmallInteger('backdelayday')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learnphases');
    }
};
