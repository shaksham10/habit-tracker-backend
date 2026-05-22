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
    Schema::create('settings', function (Blueprint $table) {

        $table->id();

        $table->string('full_name')->nullable();

        $table->string('email')->nullable();

        $table->integer('daily_goal')->default(1);

        $table->boolean('dark_mode')->default(false);

        $table->boolean('email_notifications')->default(false);

        $table->boolean('reminder_alerts')->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
