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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('identity_id');
            $table->string('agenda_name');
            $table->string('agenda_location');
            $table->datetime('agenda_date');
            $table->timestamps();

            $table->foreign('identity_id')->references('identity_id')->on('identities')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agendas', function (Blueprint $table) {
            $table->dropForeign(['identity_id']);
        });

        Schema::dropIfExists('agendas');
    }
};
