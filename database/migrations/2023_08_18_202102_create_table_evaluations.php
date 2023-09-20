<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('test_id')->constrained();
            $table->timestamp('start')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('finish')->nullable();
            $table->double('qualification')->default(0.0);
            $table->integer('answers_fine')->default(0);
            $table->integer('answers_bad')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
