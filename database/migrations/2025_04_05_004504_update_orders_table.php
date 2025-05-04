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
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'order_number')) {
                $table->string('order_number')->after('id')->nullable();
            }
            if (!Schema::hasColumn('orders', 'first_name')) {
                $table->string('first_name')->after('user_id')->nullable();
            }
            if (!Schema::hasColumn('orders', 'last_name')) {
                $table->string('last_name')->after('first_name')->nullable();
            }
            if (!Schema::hasColumn('orders', 'email')) {
                $table->string('email')->after('last_name')->nullable();
            }
            if (!Schema::hasColumn('orders', 'address')) {
                $table->string('address')->after('email')->nullable();
            }
            if (!Schema::hasColumn('orders', 'postal_code')) {
                $table->string('postal_code')->after('address')->nullable();
            }
            if (!Schema::hasColumn('orders', 'city')) {
                $table->string('city')->after('postal_code')->nullable();
            }
            if (!Schema::hasColumn('orders', 'phone')) {
                $table->string('phone')->after('city')->nullable();
            }
            if (!Schema::hasColumn('orders', 'payment_method')) {
                $table->string('payment_method')->after('phone')->nullable();
            }
            if (!Schema::hasColumn('orders', 'total_amount')) {
                $table->decimal('total_amount', 10, 2)->after('payment_method')->default(0);
            }
            if (!Schema::hasColumn('orders', 'status')) {
                $table->string('status')->after('total_amount')->default('pending');
            }
            if (!Schema::hasColumn('orders', 'order_details')) {
                $table->text('order_details')->after('status')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Reverse the changes
            $table->dropColumn([
                'order_number', 'first_name', 'last_name', 'email', 
                'address', 'postal_code', 'city', 'phone', 
                'payment_method', 'total_amount', 'status', 'order_details'
            ]);
            
            // Restore old columns
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('quantity')->default(1);
        });
    }
};
