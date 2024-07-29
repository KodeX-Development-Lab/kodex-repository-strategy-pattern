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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('country_id')->references('id')->on('countries')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('preferred_name')->nullable();
            $table->string('email')->unique();
            $table->date('joined_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
