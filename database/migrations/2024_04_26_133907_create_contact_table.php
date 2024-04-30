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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('Code',"10")->unique()->nullable(false);
            $table->string('Name',"100")->nullable(false);
            $table->string('Email',"100")->unique()->nullable(false);
            $table->string('Phone',"100");
            $table->string('Mobile',"100");
            $table->string('Street');
            $table->string('City');
            $table->string('State');
            $table->string('Zip');
            $table->string('Country');
            $table->string('VAT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
