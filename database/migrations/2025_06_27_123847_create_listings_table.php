<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'dog' or 'product'
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->json('images')->nullable();
            $table->string('location')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Dog-specific fields
            $table->string('breed')->nullable();
            $table->integer('age_months')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->enum('size', ['Small', 'Medium', 'Large'])->nullable();
            $table->string('color')->nullable();
            $table->boolean('vaccinated')->nullable();
            $table->string('health_status')->nullable();
            $table->boolean('microchipped')->nullable();
            $table->text('temperament')->nullable();
            $table->date('available_from')->nullable();

            // Product-specific fields
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('brand')->nullable();
            $table->string('suitable_for')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->string('weight_or_size')->nullable();
            $table->text('ingredients')->nullable();
            $table->date('expiry_date')->nullable();

            $table->timestamps();

            $table->index(['type', 'is_active']);
            $table->index('slug');
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
};
