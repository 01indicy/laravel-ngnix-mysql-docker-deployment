<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->id('user_id')->autoIncrement();
            $table->string('user_name')->nullable();
            $table->string('user_email')->unique()->nullable();
            $table->string('user_password',255)->nullable();
            $table->string('user_status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('tbl_users');
    }
};
