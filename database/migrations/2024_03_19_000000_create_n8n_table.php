<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('n8n', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('session_id');
            $table->json('message');
            $table->timestamps('create_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('n8n');
    }
};