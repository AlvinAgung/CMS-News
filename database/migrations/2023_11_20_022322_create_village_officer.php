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
       Schema::create('village_officer', function (Blueprint $table) {
           $table->id();
           $table->string('nip');
           $table->string('name');
           $table->string('address');
           $table->string('gender');
           $table->string('email');
           $table->string('telp');
           $table->string('jabatan_id');
           $table->string('photo');
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_officer');
    }
};
