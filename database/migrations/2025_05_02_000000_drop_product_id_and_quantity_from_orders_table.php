<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'product_id')) {
                // Drop foreign key if it exists
                try {
                    $table->dropForeign(['product_id']);
                } catch (\Exception $e) {
                    // Ignore if already dropped
                }
                $table->dropColumn('product_id');
            }
            if (Schema::hasColumn('orders', 'quantity')) {
                $table->dropColumn('quantity');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('quantity')->default(1);
        });
    }
}; 