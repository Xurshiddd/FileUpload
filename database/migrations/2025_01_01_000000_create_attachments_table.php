<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('path');
            $table->string('type')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->string('extra_identifier')->nullable();
            $table->nullableMorphs('attachment');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('attachments');
    }
};
