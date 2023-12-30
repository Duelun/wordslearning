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
        Schema::create('userwords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
                $table->foreign('user')->references('id')->on('users');
            $table->boolean('custom')->default(true);
            $table->unsignedBigInteger('book')->nullable();
            $table->foreign('book')->references('id')->on('userbooks');
            // word 1
            $table->string('word', 100);
            $table->unsignedBigInteger('wordclass')->nullable();
                $table->foreign('wordclass')->references('id')->on('wordclasses');
            $table->string('ipaword', 100)->nullable();
            $table->string('comment', 100)->nullable();
            $table->string('sentences', 200)->nullable();
            $table->unsignedBigInteger('lang1')->default(1);
                $table->foreign('lang1')->references('id')->on('countries');
            //word 2
            $table->string('meaning', 100);
            $table->string('ipameaning', 100)->nullable();
            $table->unsignedBigInteger('lang2')->default(1);
                $table->foreign('lang2')->references('id')->on('countries');
            
            // process
            $table->unsignedBigInteger('phaseforeign');
                $table->foreign('phaseforeign')->references('id')->on('learnphases');
            $table->unsignedBigInteger('phasenumberforeign')->default(0);
            $table->dateTime('delaytoforeign')->nullable();
            //
            $table->unsignedBigInteger('phaseown');
                $table->foreign('phaseown')->references('id')->on('learnphases');
            $table->unsignedTinyInteger('phasenumberown')->default(0);
            $table->dateTime('delaytoown')->nullable();
            //
            $table->boolean('customdelay')->default(false);
            $table->datetime('customdelayend')->nullable();
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userwords');
    }
};
