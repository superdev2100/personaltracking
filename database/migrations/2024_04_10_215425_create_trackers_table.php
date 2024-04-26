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
        Schema::create('trackers', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->foreignId('category_id')->index();
            $table->foreignId('sub_category_id')->index()->nullable();
            $table->foreignId('main_category_id')->index();
            $table->float('amount')->index();
            $table->string('notes')->nullable()->index();
            $table->foreignId('created_by')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackers');
    }
};
