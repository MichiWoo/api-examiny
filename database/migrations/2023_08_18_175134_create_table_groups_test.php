<?php

use App\Enums\statusEnum;
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
        Schema::create('group_test', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained('groups')->cascadeOnDelete();
            $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete();
            $table->timestamp('date_start')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('date_finish')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('status')->default(statusEnum::ACTIVATED['value']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_test');
    }
};
