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
        // 1. Sliders
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('image');
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('status')->default('active');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // 2. News
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('content');
            $table->string('status')->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // 3. Announcements
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('file')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // 4. Agendas
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        // 5. Profile Pages
        Schema::create('profile_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_key')->unique();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // 6. Researches (Penelitian)
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('scheme');
            $table->string('lecturer_name');
            $table->integer('year');
            $table->text('abstract')->nullable();
            $table->string('document')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        // 7. Community Services (Pengabdian Masyarakat)
        Schema::create('community_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('scheme');
            $table->string('lecturer_name');
            $table->integer('year');
            $table->text('abstract')->nullable();
            $table->string('document')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        // 8. Publications (Publikasi)
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type'); // Jurnal, Artikel Ilmiah, Prosiding
            $table->string('author');
            $table->string('journal_name')->nullable();
            $table->integer('year');
            $table->string('link')->nullable();
            $table->string('file')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        // 9. Documents (Dokumen)
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // Panduan, Template, Unduhan
            $table->string('file');
            $table->text('description')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
        });

        // 10. Lecturers (Dosen)
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nidn')->nullable();
            $table->string('department'); // Akuntansi, Manajemen, Ilmu Komunikasi, dll
            $table->string('expertise')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->nullable();
            $table->string('google_scholar')->nullable();
            $table->string('sinta')->nullable();
            $table->string('scopus')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 11. Galleries (Galeri)
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('description')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // 12. Contacts (Kontak)
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->string('service_hours')->nullable();
            $table->text('google_maps_embed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('lecturers');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('community_services');
        Schema::dropIfExists('researches');
        Schema::dropIfExists('profile_pages');
        Schema::dropIfExists('agendas');
        Schema::dropIfExists('announcements');
        Schema::dropIfExists('news');
        Schema::dropIfExists('sliders');
    }
};
