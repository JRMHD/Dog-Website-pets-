<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->json('images')->nullable();
            $table->json('tags')->nullable();
            $table->enum('category', ['Training', 'Breeding', 'Dog Walking', 'Health & Wellness']);
            $table->string('author');
            $table->string('meta_description', 300);
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->index('slug');
            $table->index('category');
            $table->index('is_published');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
};
