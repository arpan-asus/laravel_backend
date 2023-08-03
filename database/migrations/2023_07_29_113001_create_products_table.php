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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('title');
            $table->string('cost');
            $table->string('detail');
            $table->string('photo')->nullable();
            $table->enum('status',['show','hide'])->default('hide');//enum('status',['show','hide}'default hide bhaneko aru kei data gaye automtically hide gardini bhayo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
