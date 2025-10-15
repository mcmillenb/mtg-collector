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
        Schema::create('card_collections', function (Blueprint $table) {
            $table->id();
            $table->string('card_id')->unique();
            $table->string('name');
            $table->text('image_url')->nullable();
            $table->string('type_line')->nullable();
            $table->string('set_name')->nullable();
            $table->text('mana_cost')->nullable();
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_collections');
    }
};
