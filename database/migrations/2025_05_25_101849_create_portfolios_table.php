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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name');
            $table->string('area_sft')->nullable();
            $table->string('location')->nullable();
            $table->string('space_type')->default('residential');
            $table->string('status_type')->default('finished');
            $table->longText('url')->nullable();
            $table->string('image');
            $table->date('date');
            $table->longText('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
