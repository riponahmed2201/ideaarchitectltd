<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->longText('answer');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('designation')->nullable();
            $table->text('quote');
            $table->foreignId('portfolio_id')->nullable()->constrained('portfolios')->nullOnDelete();
            $table->string('image')->nullable();
            $table->unsignedTinyInteger('rating')->default(5);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('service_type')->nullable();
            $table->string('budget')->nullable();
            $table->date('preferred_date')->nullable();
            $table->text('message')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        Schema::create('newsletter_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('subscribed_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newsletter_subscribers');
        Schema::dropIfExists('quote_requests');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('faqs');
    }
};
