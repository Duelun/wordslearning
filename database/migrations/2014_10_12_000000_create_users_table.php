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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedTinyInteger('role')->default(0);
            $table->rememberToken();
            $table->timestamps();
            /*other pesonal */
            $table->unsignedMediumInteger('birthyear')->nullable();
            $table->string('ownlang', 3)->default('--');
            $table->string('learnedlang', 3)->default('--');

            /*webpage */
            $table->string('webstyle')->default('default');
            $table->string('weblang', 3)->default('en');
            $table->set('openpage', ['Learning', 'Dictionaries', 'Settings', 'Help'])->default('Learning');
            $table->boolean('statonpage')->default(false);
            $table->boolean('fullpagelearn')->default(false);

            /*learning*/


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
