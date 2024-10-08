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
            $table->string('package_name')->nullable()->change();
            $table->bigInteger('travel_price')->nullable()->change();
            $table->bigInteger('total_bill')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('package_name')->nullable(false)->change();
            $table->bigInteger('travel_price')->nullable(false)->change();
            $table->bigInteger('total_bill')->nullable(false)->change();
        });
    }
};
