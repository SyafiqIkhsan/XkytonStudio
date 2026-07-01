<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel projects. Jika project dihapus, komentar otomatis ikut terhapus
            $table->foreignId('project_id')->constrained()->onDelete('cascade');

            // Self-referencing foreign key untuk sistem balasan (nested/threaded comment)
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('is_admin')->default(false); // Penanda jika Anda (admin) yang membalas
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
