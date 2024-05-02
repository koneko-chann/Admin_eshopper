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
        Schema::table('supplier', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('warehouse_id')->nullable();
        });
        Schema::table('receiver', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('warehouse_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supplier', function (Blueprint $table) {
            //
        });
    }
};
