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
        Schema::table('products', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
            $table->decimal('price', 10, 2)->default(0.00)->change();
            $table->integer('stock')->default(0)->change();
            $table->string('category')->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('description')->nullable(false)->change();
            $table->decimal('price', 10, 2)->default(null)->change();
            $table->integer('stock')->default(null)->change();
            $table->string('category')->default(null)->change();
        });
    }
};
