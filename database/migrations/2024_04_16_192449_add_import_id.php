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
        Schema::table('import_products', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('import_id');
            $table->foreign('import_id')->references('id')->on('import')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('import_products', function (Blueprint $table) {
            //
            //roll back the changes

        });
    }
};
