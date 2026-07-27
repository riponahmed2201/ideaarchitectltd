<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('partners') && ! Schema::hasTable('clients')) {
            Schema::rename('partners', 'clients');
        }

        if (! Schema::hasTable('clients')) {
            Schema::create('clients', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->longText('description')->nullable();
                $table->string('logo');
                $table->boolean('status')->default(1);
                $table->timestamps();
            });
        }

        if (Storage::disk('public')->exists('partners')) {
            foreach (Storage::disk('public')->allFiles('partners') as $file) {
                $newPath = str_replace('partners/', 'clients/', $file);

                if (! Storage::disk('public')->exists($newPath)) {
                    Storage::disk('public')->move($file, $newPath);
                }
            }
        }

        DB::table('clients')
            ->where('logo', 'like', 'partners/%')
            ->update(['logo' => DB::raw("REPLACE(logo, 'partners/', 'clients/')")]);
    }

    public function down(): void
    {
        DB::table('clients')
            ->where('logo', 'like', 'clients/%')
            ->update(['logo' => DB::raw("REPLACE(logo, 'clients/', 'partners/')")]);

        if (Storage::disk('public')->exists('clients')) {
            foreach (Storage::disk('public')->allFiles('clients') as $file) {
                $newPath = str_replace('clients/', 'partners/', $file);

                if (! Storage::disk('public')->exists($newPath)) {
                    Storage::disk('public')->move($file, $newPath);
                }
            }
        }

        if (Schema::hasTable('clients') && ! Schema::hasTable('partners')) {
            Schema::rename('clients', 'partners');
        }
    }
};
