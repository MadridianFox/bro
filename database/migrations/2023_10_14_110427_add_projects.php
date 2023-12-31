<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps(6);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
