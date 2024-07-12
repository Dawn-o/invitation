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
        Schema::create('identities', function (Blueprint $table) {
            $table->string('identity_id', false)->primary();
            $table->string('male_fullname');
            $table->string('male_nickname');
            $table->string('male_description');
            $table->string('male_socmed');
            $table->string('female_fullname');
            $table->string('female_nickname');
            $table->string('female_description');
            $table->string('female_socmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identities');
    }
};
