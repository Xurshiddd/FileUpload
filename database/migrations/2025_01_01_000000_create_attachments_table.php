<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('extra_identifier')->nullable();
            $table->string('title')->nullable();
            $table->string('path');
            $table->string('size');
            $table->string('type')->nullable();
            $table->nullableMorphs('attachment');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('attachments');
    }
};
