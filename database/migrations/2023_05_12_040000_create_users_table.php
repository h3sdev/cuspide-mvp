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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number', 20);
            $table->string('password');
            $table->string('DNI');
            $table->unsignedBigInteger('document_type_id');
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->foreign('document_type_id')
                  ->references('id')
                  ->on('document_types')
                  ->onUpdate('NO ACTION')
                  ->onDelete('NO ACTION');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

