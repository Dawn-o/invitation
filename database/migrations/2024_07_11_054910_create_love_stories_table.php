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
        Schema::create('love_stories', function (Blueprint $table) {
            $table->id();
            $table->string('identity_id');
            $table->string('story');
            $table->date('date');
            $table->timestamps();

            $table->foreign('identity_id')->references('identity_id')->on('identities')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('love_stories', function (Blueprint $table) {
            $table->dropForeign(['identity_id']);
        });
        Schema::dropIfExists('love_stories');
    }
};
