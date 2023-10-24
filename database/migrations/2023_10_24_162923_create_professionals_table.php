<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('professionals', static function (Blueprint $table) {
            $table->id();
            // Could keep more data (first name, last name, degree, etc.) but keeping it simple for now
            $table->string('name');
            // The type of professional - could keep it in a separate table if one professional can have multiple types
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('professionals');
    }
};
