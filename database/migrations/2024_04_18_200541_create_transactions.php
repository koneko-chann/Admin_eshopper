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
        Schema::create('warehouse_goods_transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('receiver_id')->unsigned();
            $table->string('type');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
