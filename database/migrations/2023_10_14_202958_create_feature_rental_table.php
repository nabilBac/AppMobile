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
        Schema::create('feature_rental', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Feature::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Rental::class)->constrained()->cascadeOnDelete();
            $table->primary(['feature_id', 'rental_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_rental');
    }
};
